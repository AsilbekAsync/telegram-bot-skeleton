<?php

namespace Database;

require_once __DIR__ . '/models/users.php';

class Database
{
    private static $connection = null;

    public static function get_connection()
    {
        self::connect();
        return self::$connection;
    }

    public static function connect()
    {
        if (self::$connection === null) {
            $conn = new \mysqli(
                DATABASE_HOST,
                DATABASE_USER,
                DATABASE_PASSWORD,
                DATABASE_NAME
            );

            if ($conn->connect_error) {
                die("Connection failed:  $conn->connect_error");
            }

            self::$connection = $conn;
        }
    }
}