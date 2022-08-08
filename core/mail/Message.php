<?php

namespace Core\mail;

class Message
{
    public static string $message;
    public static function createConfirmMessage(string $name, string $verify_key): void
    {
        $text = require ROOT . '/core/mail/templates/confirm.php';
        self::$message = '<h2 style="color: blue">Вітаємо, ' . $name . '!</h2>' . '<br>'
            . '<h4>' . $text . $verify_key . '</h4>';
    }

    public static function createOrderMessage(string $userName, string $userPhone): void
    {
        self::$message = '<h2 style="color: blue">Нове замовлення!</h2>' . '<br>'
            . '<p>' . $userName . '<br>'
            .  $userPhone . '<br>'
            . date('H:i:s d-m-Y') . '</p>';
    }
    public static function createUserOrderMessage(string $userName, int $totalQuantity, int $totalPrice): void
    {
        self::$message = '<h2 style="color: blue">' . $userName . ', дякуємо за ваше замовлення!</h2>' . '<br>'
            . '<p>Обрано товарів: ' . $totalQuantity . '<br> Загальна вартість: ' . $totalPrice . ' грн</p>';
    }
}
