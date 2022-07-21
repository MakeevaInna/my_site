<?php

namespace Core\mail;

class Message
{
    public static $message;
    public static function createConfirmMessage($name, $verify_key): void
    {
        $text = require ROOT . '/core/mail/templates/confirm.php';
        self::$message = '<h2 style="color: blue">Вітаємо, ' . $name . '!</h2>' . '<br>'
            . '<h4>' . $text . $verify_key . '</h4>';
    }
}
