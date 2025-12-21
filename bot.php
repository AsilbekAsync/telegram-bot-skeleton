<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('log_errors', true);
ini_set('display_errors', true);
ini_set('error_log', __DIR__ . '/logs/error.log');

require_once __DIR__ . '/config/system.php';
require_once __DIR__ . '/library/autoload.php';

if (Message::$text === "/start") {
    Bot::send_message(
        From::$id,
        "Salom: " . From::$first_name
    );
} else {
    Bot::send_message(
        From::$id,
        "Noma'lum buyruq!"
    );
}

Bot::done();