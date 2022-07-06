<?php

$productArr = require_once ROOT . '/db/vitamins.php';
$storage = require_once ROOT . '/db/storage.php';

foreach ($storage as $key => $value) {
    if ($value == 0) {
        $noProducts[] = $key;
    }
}
        echo '<table class="products-list"><tr><th>Назва</th><th>Цiна,грн</th><th>Бренд</th><th>Наявнiсть</th></tr>';
foreach ($productArr as $productId => $value) {
    echo '<tr>';
    foreach ($value as $list) {
        echo '<td>' . $list . '</td>';
    }
    if (isset($noProducts)) {
        foreach ($noProducts as $noProduct) {
            if ($noProduct == $productId) {
                echo '<td>' . 'немає в наявності' . '</td>';
            }
        }
    }
    echo '</tr>';
}
        echo '</table>';
