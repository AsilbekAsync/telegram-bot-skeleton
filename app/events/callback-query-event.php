<?php

class CallbackQueryEvent
{
    public static function handle()
    {
        if (CallbackQuery::$data) {
            BaseCommandsController::handle_callback();
        }
    }
}