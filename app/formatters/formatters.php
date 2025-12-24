<?php

class Formatter
{
    public static function currency_to_flag_emoji($currency_code)
    {
        $flag_offset = 0x1F1E6; // Regional Indicator Symbol Letter A
        $ascii_offset = 0x41;   // ASCII 'A'

        $first_char = ord($currency_code[0]) - $ascii_offset + $flag_offset;
        $second_char = ord($currency_code[1]) - $ascii_offset + $flag_offset;

        return mb_chr($first_char) . mb_chr($second_char);
    }
}