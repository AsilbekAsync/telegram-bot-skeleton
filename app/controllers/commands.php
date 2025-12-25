<?php

class BaseCommandsController
{
    public static function start()
    {
        Bot::send_message(
            From::$id,
            Messages::welcome(),
            [
                'reply_markup' => Keyboards::locale_choice(),
            ]
        );
    }
}