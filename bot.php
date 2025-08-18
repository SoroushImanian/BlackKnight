<?php
include 'channel.php';
date_default_timezone_set('Asia/Tehran');

define('MAX_MIX_CONFIGS', 500);

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
    if ($response === false) {
        echo 'Error fetching content from ' . $url . ': ' . curl_error($ch) . PHP_EOL;
        return false;
    }
    curl_close($ch);
    return $response;
}

function extractConfigurations($content) {
    $content = html_entity_decode($content);

    $patterns = [
        'vless'     => '/vless:\/\/[^<>\'"]+/',
        'vmess'     => '/vmess:\/\/[^<>\'"]+/',
        'ss'        => '/ss:\/\/[^<>\'"]+/',
        'trojan'    => '/trojan:\/\/[^<>\'"]+/',
        'hysteria'  => '/hy2:\/\/[^<>\'"]+/',
        'tuic'      => '/tuic:\/\/[^<>\'"]+/',
        'anytls'    => '/anytls:\/\/[^<>\'"]+/',
        'wireguard' => '/wireguard:\/\/[^<>\'"]+/',
    ];
    
    $results = [];
    foreach ($patterns as $name => $pattern) {
        preg_match_all($pattern, $content, $matches);
        $results[$name] = $matches[0] ? implode(PHP_EOL, $matches[0]) : '';
    }
    return $results;
}

$allConfigs = [
    'vless' => [], 'vmess' => [], 'ss' => [], 'trojan' => [], 
    'hysteria' => [], 'tuic' => [], 'anytls' => [], 'wireguard' => []
];

foreach ($telegramChannelURLs as $channelURL) {
    $channelContent = fetchContent($channelURL);

    if ($channelContent !== false) {
        $extracted = extractConfigurations($channelContent);
        foreach ($extracted as $name => $configs_string) {
            if (!empty($configs_string)) {
                $allConfigs[$name][] = $configs_string;
            }
        }
    }
}

$fileContents = [];
$allConfigsFlat = [];

foreach ($allConfigs as $name => $configs_arrays) {
    $contentString = implode(PHP_EOL, $configs_arrays);
    
    $cleanedContent = preg_replace("/\n\s*\n/", "\n", $contentString);
    
    $fileContents[$name] = $cleanedContent;
    
    if (!empty($cleanedContent)) {
        $allConfigsFlat = array_merge($allConfigsFlat, explode(PHP_EOL, $cleanedContent));
    }
}

$uniqueConfigsFlat = array_unique($allConfigsFlat);
shuffle($uniqueConfigsFlat);
$mixConfigs = array_slice($uniqueConfigsFlat, 0, MAX_MIX_CONFIGS);
$fileContents['mix'] = implode(PHP_EOL, $mixConfigs);

foreach ($fileContents as $key => $content) {
    $finalContent = empty(trim($content)) ? '// Nothing yet' : $content;

    file_put_contents("sub/{$key}", $finalContent);
    file_put_contents("sub/{$key}base64", base64_encode($finalContent));
}

echo "Config collection finished successfully. Total unique configs in mix: " . count($mixConfigs) . PHP_EOL;
?>
