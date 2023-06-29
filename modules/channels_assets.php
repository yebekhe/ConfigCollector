<?php
include "config.php";

$channel_array = [];

if (!file_exists('modules/channels/')) {
    mkdir('modules/channels/', 0777, true);
}

$dir = 'channels';

// Get a list of all files in the directory
$files = glob($dir.'/*');

// Loop through the files and delete them
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}

foreach ($Types as $channel => $data_array){
    $html = file_get_contents("https://t.me/s/" . $channel);
    $title_pattern = '#<meta property="twitter:title" content="(.*?)">#';
    $image_pattern = '#<meta property="twitter:image" content="(.*?)">#';
    preg_match($image_pattern, $html , $image_match);
    preg_match($title_pattern, $html , $title_match);
    file_put_contents("modules/channels/" . $channel . ".jpg", file_get_contents($image_match[1]));
    $channel_array[$channel]['types'] = $data_array;
    $channel_array[$channel]['title'] = $title_match[1];
    $channel_array[$channel]['logo'] = "https://raw.githubusercontent.com/yebekhe/TelegramV2rayCollector/main/modules/channels/" . $channel . ".jpg";
}
file_put_contents("modules/channels/channels_assets.json", json_encode($channel_array , JSON_PRETTY_PRINT));
?>
