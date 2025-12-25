<?php

/**
 * Messages localization facade
 *
 * @method static string welcome()
 * @method static string locale_changed()
 */

final class Messages
{
    private static string $locale = 'en';
    private static ?object $class = null;

    public static function init(): void
    {
        self::setLocale(self::$locale);
    }

    public static function setLocale(string $locale): void
    {
        $path = __DIR__ . "/lang/{$locale}.php";

        if (!is_file($path)) {
            $locale = 'en';
            $path = __DIR__ . "/lang/en.php";
        }

        self::$locale = $locale;
        self::$class = require $path;
    }

    private static function get(string $method, ...$args): string
    {
        if (self::$class && method_exists(self::$class, $method)) {
            return self::$class::$method(...$args);
        }

        return self::$locale . "::" . $method;
    }

    public static function __callStatic(string $name, array $arguments): string
    {
        return self::get($name, ...$arguments);
    }
}
