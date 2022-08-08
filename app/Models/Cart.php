<?php

namespace App\Models;

use Base\Model;
use PDO;

class Cart extends Model
{
    public function getProductsByCodes(array $codesArray): bool|array
    {
        $codesString = implode(',', $codesArray);
        $sql = "SELECT `code`, `title`, `brand`, `price`, `img`
                  FROM `products`
                 WHERE `code` IN ($codesString)";
        return $this->executeSql($sql)->fetchAll();
    }

    public function saveOrder(
        string $fullName,
        string $phone,
        string $email,
        string $comment,
        string $delivery,
        string $pay,
        int $userId,
        array $productsInCart
    ): object|bool {
        $productsInCart = json_encode($productsInCart);
        $sql = "INSERT INTO `products_order` (`full_name`, `phone`, `email`, `comment`, `delivery`, `pay`, `user_id`, 
                              `products`, `date`)
                     VALUES (:full_name, :phone, :email, :comment, :delivery, :pay, :user_id, :products, :date)";
        $params = ['full_name' => $fullName, 'phone' => $phone, 'email' => $email, 'comment' => $comment,
           'delivery' => $delivery, 'pay' => $pay, 'user_id' => $userId, 'products' => $productsInCart,
            'date' => date('Y-m-d H:i:s')];
//        debug($this->executeSql($sql, $params));
//        die();
        return $this->executeSql($sql, $params);
    }

    public function saveFastOrder(
        string $name,
        string $phone,
        int $userId,
        array $productsInCart
    ): object|bool {
        $productsInCart = json_encode($productsInCart);
        $sql = "INSERT INTO `products_order_fast` (`name`, `phone`, `user_id`, `products`, `date`)
                     VALUES (:name, :phone, :user_id, :products, :date)";
        $params = ['name' => $name, 'phone' => $phone, 'user_id' => $userId, 'products' => $productsInCart,
            'date' => date('Y-m-d H:i:s')];
        return $this->executeSql($sql, $params);
    }
}
