<?php

class Messages
{
    public static function welcome()
    {
        return "Welcome to my currency exchange rate bot!";
    }

    public static function make_exchange_rate_message($base_currency, $rates)
    {
        $message = "Exchange rates for 1 $base_currency:\n\n";
        $rates = array_filter(
            $rates,
            fn($currency) => in_array($currency, ALLOWED_CURRENCIES),
            ARRAY_FILTER_USE_KEY
        );
        foreach ($rates as $currency => $rate) {
            // $currency .= ' ' . Formatter::currency_to_flag_emoji($currency);
            $message .= "1 $base_currency = $rate $currency\n";
        }
        return $message;
    }

    public static function error_fetching_rates()
    {
        return "Sorry, I couldn't fetch the exchange rates at this time. Please try again later.";
    }

    public static function loading_rates()
    {
        return "Fetching the latest exchange rates...";
    }
}