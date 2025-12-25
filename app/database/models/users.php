<?php

namespace Database\Models;

/*

Database schema for 'users' table

Prototype:
----------------------------
* Users {
    id i p a+
    chat_id bi u
    @locale v:4='en'
    @step v:256=null
    @created_at dt=now()
    @updated_at dt=now()
}
----------------------------

SQL:
-------------------------------------------------------
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    chat_id BIGINT UNSIGNED UNIQUE,
    locale VARCHAR(4) NOT NULL DEFAULT 'en',
    step VARCHAR(256) DEFAULT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
-------------------------------------------------------


*/

class Users
{
    private const TABLE = "users";

    private const FILLABLE = [
        "locale",
        "step"
    ];

    public static function get_by_chat_id($chat_id)
    {
        $conn = \Database\Database::get_connection();
        $stmt = $conn->prepare("SELECT * FROM " . self::TABLE . " WHERE chat_id = ?");
        $stmt->bind_param("i", $chat_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public static function create($chat_id, $locale = 'en', $step = null)
    {
        $conn = \Database\Database::get_connection();

        $stmt = $conn->prepare("INSERT INTO " . self::TABLE . " (chat_id, locale, step) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $chat_id, $locale, $step);
        $stmt->execute();

        return $conn->insert_id;
    }

    public static function update($chat_id, $column, $value = null)
    {
        if (!\in_array($column, self::FILLABLE)) {
            return false;
        }

        $conn = \Database\Database::get_connection();

        $stmt = $conn->prepare("UPDATE " . self::TABLE . " SET $column = ? WHERE chat_id = ?");
        $stmt->bind_param("si", $value, $chat_id);
        $stmt->execute();

        return $stmt->affected_rows;
    }
}