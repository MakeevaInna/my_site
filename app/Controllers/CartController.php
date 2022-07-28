<?php

namespace App\Controllers;

use Base\Controller;
use Core\Session;

class CartController extends Controller
{
    public function cartAction()
    {
        $productsInCart = Session::get('products');
        if ($productsInCart) {
            $productsCodes = array_keys($productsInCart);
            $products = $this->model->getProductsByCodes($productsCodes);
            $totalPrice = self::getTotalPrice($products);
            $this->set([
                'title' => 'Кошик',
                'content' => $products,
                'productsInCart' => $productsInCart,
                'totalPrice' => $totalPrice
            ]);
        }
    }

    public function addAction()
    {
        $this->view = 'cart';
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = (int) $url[2];
        $productsInCart = [];
        if (isset($_SESSION['products'])) {
            $productsInCart = Session::get('products');
        }
        if (array_key_exists($code, $productsInCart)) {
            $productsInCart[$code]++;
        } else {
            $productsInCart[$code] = 1;
        }
        $_SESSION['products'] = $productsInCart;
        $referer = $_SERVER['HTTP_REFERER'];
        header('Location:' . $referer);
    }

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach (($_SESSION['products']) as $code => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    public static function getTotalPrice($products)
    {
        $productsInCart = Session::get('products');
        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['code']];
            }
        }
        return $total;
    }
}
