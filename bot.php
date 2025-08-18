<?php
include 'channel.php';
date_default_timezone_set('Asia/Tehran');

define('MAX_MIX_CONFIGS', 500);

$protocols = [
    'vless'     => '/vless:\/\/\S+/',
    'vmess'     => '/vmess:\/\/\S+/',
    'ss'        => '/ss:\/\/\S+/',
    'trojan'    => '/trojan:\/\/\S+/',
    'hysteria'  => '/hy2:\/\/\S+/',
    'tuic'      => '/tuic:\/\/\S+/',
    'anytls'    => '/anytls:\/\/\S+/',
    'wireguard' => '/wireguard:\/\/\S+/',
];

function fetchContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept-Language: en-US,fa;q=0.9',
        'Cookie: messagesDesktopMode=0;'
    ]);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $response;
}

$allConfigs = array_fill_keys(array_keys($protocols), []);

foreach ($telegramChannelURLs as $channelURL) {
    try {
        $rawContent = fetchContent($channelURL);
        
        $plainText = strip_tags($rawContent);
        $cleanedContent = html_entity_decode($plainText);

        foreach ($protocols as $name => $pattern) {
            if (preg_match_all($pattern, $cleanedContent, $matches)) {
                $allConfigs[$name] = array_merge($allConfigs[$name], $matches[0]);
            }
        }
    } catch (Exception $e) {
        echo "Could not fetch channel {$channelURL}: " . $e->getMessage() . PHP_EOL;
        continue;
    }
}

$fileContents = [];
$allConfigsFlat = []; 

foreach ($protocols as $name => $pattern) {
    $uniqueConfigs = array_unique($allConfigs[$name]);
    $contentString = implode(PHP_EOL, $uniqueConfigs);
    
    $fileContents[$name] = $contentString;
    
    if (!empty($uniqueConfigs)) {
        $allConfigsFlat = array_merge($allConfigsFlat, $uniqueConfigs);
    }
}

shuffle($allConfigsFlat);
$mixConfigs = array_slice($allConfigsFlat, 0, MAX_MIX_CONFIGS);
$fileContents['mix'] = implode(PHP_EOL, $mixConfigs);

foreach ($fileContents as $key => $content) {
    $finalContent = empty($content) ? '// Nothing yet' : preg_replace("/\n\s*\n/", "\n", $content);

    file_put_contents("sub/{$key}", $finalContent);
    file_put_contents("sub/{$key}base64", base64_encode($finalContent));
}

echo "Config collection finished successfully. Total unique configs in mix: " . count($mixConfigs) . PHP_EOL;

?>
