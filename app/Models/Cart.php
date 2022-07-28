<?php

namespace App\Models;

use Base\Model;
use PDO;

class Cart extends Model
{
    public function getProductsByCodes($codesArray): array
    {
        $products = [];
        $codesString = implode(',', $codesArray);
        $sql = "SELECT `code`, `title`, `brand`, `price`, `img`
                  FROM `products`
                 WHERE `code` IN ($codesString)";
        $result = $this->executeSql($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['code'] = $row ['code'];
            $products[$i]['title'] = $row ['title'];
            $products[$i]['brand'] = $row ['brand'];
            $products[$i]['price'] = $row ['price'];
            $products[$i]['img'] = $row ['img'];
            $i++;
        }
        return $products;
    }
}
