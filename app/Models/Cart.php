<?php

namespace App\Models;

use Base\Model;
use PDO;

class Cart extends Model
{
    public function getProductsByCodes($codesArray): array
    {
        $codesString = implode(',', $codesArray);
        $sql = "SELECT `code`, `title`, `brand`, `price`, `img`
                  FROM `products`
                 WHERE `code` IN ($codesString)";
        return $this->executeSql($sql)->fetchAll();
    }
}
