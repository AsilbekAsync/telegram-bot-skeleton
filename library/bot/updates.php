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
}

$update = file_get_contents("php://input");

$update = json_decode($update);

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
}
