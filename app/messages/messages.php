<?php

class Messages
{
    public static function welcome_message()
    {
        return "Salomlar! Botga xush kelibsiz.";
    }

    public static function handle_callback_message($data)
    {
        return "Siz callback tugmasini bosdingiz! Callback ma'lumotlari: $data";
    }
}