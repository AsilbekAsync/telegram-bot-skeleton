<?php

class MessageEvent
{
    public static function handle()
    {
        if (Message::$text == Keywords::$start) {
            BaseCommandsController::handle_start();
        }
    }
}