<?php

namespace Core;

class Session
{
    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public static function set(string $name, mixed $value): void
    {
        if (isset($_SESSION)) {
            $_SESSION[$name] = $value;
        }
    }
    public static function setArray(array $vars): void
    {
        if (isset($_SESSION)) {
            foreach ($vars as $name => $value) {
                self::set($name, $value);
            }
        }
    }
    public static function get(string $name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }
    public static function showMessage(): void
    {
        if (!empty($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        self::del('message');
    }
    public static function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }
    public static function del(string $name): void
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }
    public static function destroy(): void
    {
        if (isset($_SESSION)) {
            session_destroy();
        }
    }
}
