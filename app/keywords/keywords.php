<?php

class Keywords
{
    public static $locale = "uz";
    private static $data = null;

    public static function get($key, $args = [])
    {
        $value = self::$data[$key];

        if (is_callable($value)) {
            return call_user_func_array($value, $args);
        }

        return $value ?? self::$locale . "_$key";
    }

    public static function init()
    {
        self::set_locale(self::$locale);
    }

    public static function set_locale($locale)
    {
        if (!file_exists(__DIR__ . "/lang/$locale.php")) {
            $locale = "uz";
        }

        self::$locale = $locale;
        self::$data = require_once __DIR__ . "/lang/$locale.php";
    }
}