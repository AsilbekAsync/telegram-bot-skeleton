<?php

require_once __DIR__ . '/config/system.php';
require_once __DIR__ . '/library/autoload.php';

$host = $_SERVER['HTTP_HOST'];
$folder = dirname($_SERVER['SCRIPT_NAME']);

$file_name = sprintf("https://%s%sbot.php", $host, $folder);

header("Content-Type: application/json");
echo json_encode(Bot::set_webhook($file_name));