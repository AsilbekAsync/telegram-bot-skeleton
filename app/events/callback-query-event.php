<?php

class CallbackQueryEvent
{
    public static function handle()
    {
        $data = CallbackQuery::$data;

        if (mb_stripos($data, 'set_locale=') !== false) {
            $parts = explode('=', $data);
            $locale = $parts[1];

            \Database\Models\Users::update(
                From::$id,
                'locale',
                $locale
            );
            Store::$locale = $locale;
            Keywords::set_locale($locale);
            Messages::setLocale($locale);

            Bot::edit_message_text(
                From::$id,
                Message::$message_id,
                Messages::locale_changed(),
                [
                    'reply_markup' => Keyboards::locale_choice(),
                ]
            );
        }
    }
}