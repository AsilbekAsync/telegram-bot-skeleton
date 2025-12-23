<?php

class KeyboardsConstructor
{
    public static function inline_keyboard($buttons)
    {
        return json_encode([
            'inline_keyboard' => $buttons
        ]);
    }

    public static function keyboard($buttons, $resize_keyboard = true, $one_time_keyboard = false)
    {
        return json_encode([
            'keyboard' => $buttons,
            'resize_keyboard' => $resize_keyboard,
            'one_time_keyboard' => $one_time_keyboard
        ]);
    }
}