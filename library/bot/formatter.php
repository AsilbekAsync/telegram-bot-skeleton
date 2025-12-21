<?php

const LINE_BREAK = "\n";

class Formatter
{
    public static function bold($text)
    {
        return "<b>$text</b>";
    }

    public static function italic($text)
    {
        return "<i>$text</i>";
    }

    public static function underline($text)
    {
        return "<u>$text</u>";
    }

    public static function code($text)
    {
        return "<code>$text</code>";
    }

    public static function link($text, $url)
    {
        return "<a href=\"$url\">$text</a>";
    }
}