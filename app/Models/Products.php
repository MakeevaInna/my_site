<?php

namespace App\Models;

use Base\Model;
use Exceptions\IdNotFound;

class Products extends Model
{
    public function getProduct($code)
    {
        $sql = "SELECT *
                  FROM `products`
                 WHERE `code` = :code";
        $params = ['code' => $code];
        $result = $this->executeSql($sql, $params)->fetch();
        if (!empty($result)) {
            return $result;
        }
        throw new IdNotFound('Товар з артикулом ' . $code . ' не знайдено!');
    }

    public function getProductsAboutCategory($category): bool|array
    {
        $sql = "SELECT *
                  FROM `products`
                 WHERE `category` = :category";
        $params = ['category' => $category];
        return $this->executeSql($sql, $params)->fetchAll();
    }

    public function getProductsAboutType($type): bool|array
    {
        $sql = "SELECT *
                  FROM `products`
                 WHERE `type` = :t";
        $params = ['t' => $type];
        $result = $this->executeSql($sql, $params)->fetchAll();
        if (!empty($result)) {
            return $result;
        }
        throw new IdNotFound('Товарів типу ' . $type . ' не знайдено!');
    }

    public function getAllProducts(): bool|array
    {
        $sql = "SELECT * FROM products";
        return $this->executeSql($sql)->fetchAll();
    }
}
