<?php

require_once __DIR__ . '/config/error-config.php';
require_once __DIR__ . '/config/system.php';
require_once __DIR__ . '/library/autoload.php';
require_once __DIR__ . '/app/autoload.php';


Updates::parse();

$user_info = \Database\Models\Users::get_by_chat_id(From::$id);

if ($user_info === null) {
    $insert_id = \Database\Models\Users::create(From::$id);

    Store::$locale = "uz";
    Store::$user_id = $insert_id;
} else {
    Store::$locale = $user_info['locale'];
    Store::$user_id = $user_info['id'];
}

Keywords::set_locale(Store::$locale);
Messages::setLocale(Store::$locale);

if (Message::$text !== null) {
    MessageEvent::handle();
}

if (CallbackQuery::$data !== null) {
    CallbackQueryEvent::handle();
}

Bot::done();