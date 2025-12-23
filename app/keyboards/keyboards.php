<?php


class Keyboards
{
    public static function index_menu()
    {
        return KeyboardsConstructor::inline_keyboard([
            [['text' => "Button 1", 'callback_data' => 'button1']],
            [['text' => "Button 2", 'callback_data' => 'button2']]
        ]);
    }
}