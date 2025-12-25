<?php


class Keyboards
{
    public static function locale_choice(): string
    {
        $locales = [
            'uz' => "O'zbekcha",
            'ru' => "Русский",
            'en' => "English",
        ];

        $buttons = [];

        foreach ($locales as $key => $value) {
            $delta = Store::$locale === $key ? " ✅" : "";
            $buttons[] = [
                'text' => "$delta $value",
                'callback_data' => "set_locale=$key",
            ];
        }

        $buttons = array_chunk($buttons, 2);

        return KeyboardsConstructor::inline_keyboard($buttons);
    }
}