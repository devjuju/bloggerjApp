<?php

namespace App\Core;

class Auth
{


    public static function start(): void
    {
        if (session_start() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public static function get(string $name, string $key)
    {
        // self::start();
        return isset($_SESSION[$name][$key]) ? $_SESSION[$name][$key] : null;
    }


    public static function set(string $name, string $key, $value): void
    {
        // self::start();
        $_SESSION[$name][$key] = $value;
    }


    public static function delete(string $name, string $key): void
    {
        //self::start();
        if (isset($_SESSION[$name][$key])) {
            unset($_SESSION[$name][$key]);
        }
    }

    public static function has(string $name, $key = false): bool
    {
        //self::start();
        if ($key) {
            return isset($_SESSION[$name][$key]);
        }
        return isset($_SESSION[$name]);
    }

    public static function destroy(): void
    {
        // self::start();
        session_unset();
        session_destroy();
    }
}
