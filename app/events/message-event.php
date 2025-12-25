<?php

class MessageEvent
{
    public static function handle()
    {
        if (Message::$text === Keywords::get('start')) {
            BaseCommandsController::start();
        } else {
            Bot::send_message(
                From::$id,
                implode("=> \n", [
                    Store::$locale,
                    Store::$user_id,
                    Store::$step ?? 'no step',
                ])
            );
        }
    }
}