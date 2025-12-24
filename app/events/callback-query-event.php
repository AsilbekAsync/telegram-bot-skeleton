<?php

class CallbackQueryEvent
{
    public static function handle()
    {
        if (mb_stripos(CallbackQuery::$data, 'currency=') !== false) {
            Bot::edit_message_text(
                From::$id,
                Message::$message_id,
                Messages::loading_rates()
            );
            $currency = str_replace('currency=', '', CallbackQuery::$data);
            $rates = CurrencyAPI::get_exchange_rate($currency);
            $message = $rates !== null
                ? Messages::make_exchange_rate_message($currency, $rates)
                : Messages::error_fetching_rates();

            Bot::edit_message_text(
                From::$id,
                Message::$message_id,
                $message,
                [
                    'reply_markup' => Keyboards::index_menu()
                ]
            );
        }
    }
}