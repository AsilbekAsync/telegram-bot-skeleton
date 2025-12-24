<?php

class From
{
    public static $id;
    public static $is_bot;
    public static $first_name;
    public static $last_name;
    public static $username;
}

class Chat
{
    public static $id;
    public static $first_name;
    public static $last_name;
    public static $username;
    public static $type;
}

class Message
{
    public static $text;
    public static $date;
    public static $message_id;
}

class CallbackQuery
{
    public static $id;
    public static $data;
}

class Updates
{
    public static $update = null;
    public static function parse($update = null)
    {
        $update = json_decode($update) ?? json_decode(file_get_contents("php://input"));
        self::$update = $update;

        if (isset($update->message)) {
            $message = $update->message;
            $from = $message->from;

            From::$id = $from->id;
            From::$is_bot = $from->is_bot;
            From::$first_name = $from->first_name;
            From::$last_name = $from->last_name;
            From::$username = $from->username;

            $chat = $message->chat;

            Chat::$id = $chat->id;
            Chat::$first_name = $chat->first_name;
            Chat::$last_name = $chat->last_name;
            Chat::$username = $chat->username;
            Chat::$type = $chat->type;

            Message::$text = $message->text;
            Message::$date = $message->date;
            Message::$message_id = $message->message_id;
        } else if (isset($update->callback_query)) {
            $callback_query = $update->callback_query;
            $from = $callback_query->from;

            From::$id = $from->id;
            From::$is_bot = $from->is_bot;
            From::$first_name = $from->first_name;
            From::$last_name = $from->last_name;
            From::$username = $from->username;

            $message = $callback_query->message;
            $chat = $message->chat;

            Chat::$id = $chat->id;
            Chat::$first_name = $chat->first_name;
            Chat::$last_name = $chat->last_name;
            Chat::$username = $chat->username;
            Chat::$type = $chat->type;

            CallbackQuery::$id = $callback_query->id;
            CallbackQuery::$data = $callback_query->data;

            Message::$message_id = $message->message_id;
        }
    }

    public static function get_update()
    {
        return self::$update;
    }

    public static function save_update($path)
    {
        file_put_contents($path, json_encode(self::$update, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}