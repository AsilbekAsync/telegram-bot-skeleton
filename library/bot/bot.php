<?php

class Bot
{
    private static function send_request(string $command, array $data)
    {
        $url = "https://api.telegram.org/bot" . TELEGRAM_BOT_API_KEY . "/$command";
        $query = curl_init();
        curl_setopt($query, CURLOPT_URL, $url);
        curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($query, CURLOPT_POST, true);
        curl_setopt($query, CURLOPT_POSTFIELDS, http_build_query($data));

        $result = curl_exec($query);

        if ($result === false) {
            throw new Exception(curl_error($query), curl_errno($query));
        }

        if (curl_getinfo($query, CURLINFO_HTTP_CODE) !== 200) {
            error_log("Telegram API returned HTTP code " . curl_getinfo($query, CURLINFO_HTTP_CODE) . " for command $command with response: $result");
        }

        curl_close($query);
        return json_decode($result, true);
    }

    public static function send_message($chat_id, string $text, array $options = [])
    {
        return self::send_request('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => TELEGRAM_BOT_PARSE_MODE,
            'protect_content' => $options['protect_content'] ?? TELEGRAM_BOT_PROTECT_CONTENT,
        ] + $options);
    }


    public static function set_webhook(string $url, array $options = [])
    {
        return self::send_request('setWebhook', [
            'url' => $url,
        ] + $options);
    }

    public static function edit_message_text($chat_id, int $message_id, string $text, array $options = [])
    {
        return self::send_request('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => $text,
            'parse_mode' => TELEGRAM_BOT_PARSE_MODE,
            'protect_content' => $options['protect_content'] ?? TELEGRAM_BOT_PROTECT_CONTENT,
        ] + $options);
    }

    public static function done()
    {
        exit;
    }
}