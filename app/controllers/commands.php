<?php

class BaseCommandsController
{
    public static function handle_start()
    {
        Bot::send_message(
            From::$id,
            Messages::welcome_message(),
            [
                'reply_markup' => Keyboards::index_menu()
            ]
        );
    }

    public static function handle_callback()
    {
        $data = CallbackQuery::$data;

        Bot::send_message(
            From::$id,
            Messages::handle_callback_message($data)
        );
    }
}