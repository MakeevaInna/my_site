<?php

namespace App\Models;

use Base\Model;

class Main extends Model
{
    public function getNewProducts(): bool|array
    {
        $sql = "SELECT `code`, `title`, `price`, `img` FROM products ORDER BY `id` DESC LIMIT 4";
        return $this->executeSql($sql)->fetchAll();
    }
}
