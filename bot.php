<?php

require_once __DIR__ . '/config/error-config.php';
require_once __DIR__ . '/config/system.php';
require_once __DIR__ . '/library/autoload.php';
require_once __DIR__ . '/app/autoload.php';


Updates::parse();
Updates::save_update(__DIR__ . '/update.json');

if (Message::$text !== null) {
    MessageEvent::handle();
}

if (CallbackQuery::$data !== null) {
    CallbackQueryEvent::handle();
}

Bot::done();