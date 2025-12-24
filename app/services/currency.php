<?php

class CurrencyAPI
{
    private static $api_url = 'https://api.exchangerate-api.com/v4/latest';

    public static function get_exchange_rate($base_currency)
    {
        $cache_file = __DIR__ . '/../../caches/exchange_rates_' . strtoupper($base_currency) . '.json';
        if (file_exists($cache_file) && time() - filemtime($cache_file) < 12 * 60 * 60) {
            $data = json_decode(file_get_contents($cache_file), true);
            return $data['rates'];
        }

        $url = self::$api_url . '/' . strtoupper($base_currency);
        $response = file_get_contents($url);
        if ($response === false) {
            return null;
        }

        $data = json_decode($response, true);
        if (isset($data['rates'])) {
            file_put_contents($cache_file, json_encode($data));
            return $data['rates'];
        }

        return null;
    }
}