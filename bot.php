<?php
include 'channel.php';
date_default_timezone_set('Asia/Tehran');

function fetchContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept-Language: en-US,fa;q=0.9',
        'Cookie: messagesDesktopMode=0;'
    ]);
    $response = curl_exec($ch);
    if ($response === false) {
        throw new Exception('Error fetching the content: ' . curl_error($ch));
    }
    curl_close($ch);
    return $response;
}

function extractConfigurations($content) {
    $vlessPattern = '/vless:\/\/[^<>\'"]+/';
    $vmessPattern = '/vmess:\/\/[^<>\'"]+/';
    $ssPattern = '/ss:\/\/[^<>\'"]+/';
    $trojanPattern = '/trojan:\/\/[^<>\'"]+/';
    $H2Pattern = '/hy2:\/\/[^<>\'"]+/';
    $tuicPattern = '/tuic:\/\/[^<>\'"]+/';
    $anytlsPattern = '/anytls:\/\/[^<>\'"]+/';

    return [
        implode(PHP_EOL, preg_match_all($vlessPattern, $content, $vlessMatches) ? $vlessMatches[0] : []),
        implode(PHP_EOL, preg_match_all($vmessPattern, $content, $vmessMatches) ? $vmessMatches[0] : []),
        implode(PHP_EOL, preg_match_all($ssPattern, $content, $ssMatches) ? $ssMatches[0] : []),
        implode(PHP_EOL, preg_match_all($trojanPattern, $content, $trojanMatches) ? $trojanMatches[0] : []),
        implode(PHP_EOL, preg_match_all($H2Pattern, $content, $H2Matches) ? $H2Matches[0] : []),
        implode(PHP_EOL, preg_match_all($tuicPattern, $content, $tuicMatches) ? $tuicMatches[0] : []),
        implode(PHP_EOL, preg_match_all($anytlsPattern, $content, $anytlsMatches) ? $anytlsMatches[0] : []),
    ];
}

function generateTrojanConfig() {
    $currentDateTime = date('D-d-M-Y H:i');
    return "trojan://bcacaab-baca-baca-dbac-accaabbcbacb@127.0.0.1:1080?security=tls&type=tcp#%F0%9F%94%84%20LATEST-UPDATE%20%F0%9F%93%85%20{$currentDateTime}";
}

function Signature() {
    return "trojan://bcacaab-baca-baca-dbac-accaabbcbacb@127.0.0.1:8080?security=tls&type=tcp#%C2%A9Made%20by:%20github.com/MhdiTaheri%20%F0%9F%93%8C";
}

$allVlessConfigs = $allVMessConfigs = $allSSConfigs = $allTrojanConfigs = $allH2Configs = $alltuicConfigs = $allAnyTlsConfigs = [];

foreach ($telegramChannelURLs as $channelURL) {
    $channelContent = fetchContent($channelURL);

    if ($channelContent !== false) {
        [
            $allVlessConfigs[],
            $allVMessConfigs[],
            $allSSConfigs[],
            $allTrojanConfigs[],
            $allH2Configs[],
            $alltuicConfigs[],
            $allAnyTlsConfigs[],
        ] = extractConfigurations($channelContent);
    }
}

$trojanConfig = generateTrojanConfig();
$signature = Signature();

$allVlessConfigs = array_filter($allVlessConfigs);
$allVMessConfigs = array_filter($allVMessConfigs);
$allSSConfigs = array_filter($allSSConfigs);
$allTrojanConfigs = array_filter($allTrojanConfigs);
$allH2Configs = array_filter($allH2Configs);
$alltuicConfigs = array_filter($alltuicConfigs);
$allAnyTlsConfigs = array_filter($allAnyTlsConfigs);


$vlessContent = implode(PHP_EOL, $allVlessConfigs);
$vmessContent = implode(PHP_EOL, $allVMessConfigs);
$ssContent = implode(PHP_EOL, $allSSConfigs);
$trojanContent = implode(PHP_EOL, $allTrojanConfigs);
$hysteriaContent = implode(PHP_EOL, $allH2Configs);
$tuicContent = implode(PHP_EOL, $alltuicConfigs);
$anytlsContent = implode(PHP_EOL, $allAnyTlsConfigs);

$fileContents = [
    'vless' => $trojanConfig . PHP_EOL . $vlessContent . PHP_EOL . $signature,
    'vmess' => $trojanConfig . PHP_EOL . $vmessContent . PHP_EOL . $signature,
    'ss' => $trojanConfig . PHP_EOL . $ssContent . PHP_EOL . $signature,
    'trojan' => $trojanConfig . PHP_EOL . $trojanContent . PHP_EOL . $signature,
    'hysteria' => $trojanConfig . PHP_EOL . $hysteriaContent . PHP_EOL . $signature,
    'tuic' => $trojanConfig . PHP_EOL . $tuicContent . PHP_EOL . $signature,
    'anytls' => $trojanConfig . PHP_EOL . $anytlsContent . PHP_EOL . $signature, // <--- فایل جدید
    'mix' => $trojanConfig . PHP_EOL .
        $vlessContent . PHP_EOL .
        $vmessContent . PHP_EOL .
        $ssContent . PHP_EOL .
        $trojanContent . PHP_EOL .
        $hysteriaContent . PHP_EOL .
        $tuicContent . PHP_EOL .
        $anytlsContent . PHP_EOL .
        $signature,
];

foreach ($fileContents as $key => $content) {
    $cleanedContent = preg_replace("/\n\s*\n/", "\n", $content);
    file_put_contents("sub/{$key}", $cleanedContent);
    file_put_contents("sub/{$key}base64", base64_encode($cleanedContent));
}
?>
