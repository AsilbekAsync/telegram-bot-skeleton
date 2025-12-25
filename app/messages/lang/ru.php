<?php


return new class {
    public static function welcome()
    {
        return "Добро пожаловать в мой личный бот! В немногом времени я постараюсь вашим помощником в различных задачах.";
    }

    public static function locale_changed()
    {
        return "Язык успешно изменен. Теперь я могу общаться с вами на русском языке.";
    }
};
