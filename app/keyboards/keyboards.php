<?php


class Keyboards
{
    public static function index_menu()
    {
        $keyboard = [];
        $row = [];

        foreach (ALLOWED_CURRENCIES as $currency) {
            $row[] = [
                'text' => $currency,
                'callback_data' => "currency=$currency"
            ];

            if (count($row) === 3) {
                $keyboard[] = $row;
                $row = [];
            }
        }

        return json_encode(['inline_keyboard' => $keyboard]);
    }
}