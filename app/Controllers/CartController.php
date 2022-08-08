<?php

namespace App\Controllers;

use Base\Controller;
use Core\mail\MailerTransport;
use Core\mail\Message;
use Core\Session;

class CartController extends Controller
{
    public function cartAction(): void
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
        } else {
            $this->set([
                'title' => 'Кошик',
                'content' => '',
            ]);
        }
    }

    public function addAction(): void
    {
        $this->view = 'cart';
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = (int)$url[2];
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

    public static function countItems(): int
    {
        if (!empty($_SESSION['products'])) {
            $count = 0;
            foreach (($_SESSION['products']) as $code => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getTotalPrice(array $products): int
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

    public function deleteAction(): void
    {
        $this->view = 'cart';
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = (int)$url[2];
        if (isset($_SESSION['products'][$code])) {
            unset($_SESSION['products'][$code]);
            $this->doRedirect('/cart');
        }
    }

    public function incrementAmountAction(): void
    {
        $this->view = 'cart';
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = (int)$url[2];
        if (isset($_SESSION['products'][$code])) {
            $_SESSION['products'][$code]++;
            $this->doRedirect('/cart');
        }
    }

    public function decrementAmountAction(): void
    {
        $this->view = 'cart';
        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = (int)$url[2];
        if (isset($_SESSION['products'][$code])) {
            if ($_SESSION['products'][$code] === 1) {
                $_SESSION['products'][$code] = 1;
            } else {
                $_SESSION['products'][$code]--;
            }
            $this->doRedirect('/cart');
        }
    }

    public function checkoutAction(): void
    {
        if (!empty($_SESSION['products'])) {
            $productsInCart = Session::get('products');
            $productsCodes = array_keys($productsInCart);
            $products = $this->model->getProductsByCodes($productsCodes);
            $totalPrice = self::getTotalPrice($products);
            $totalQuantity = self::countItems();

            $userName = false;
            $userPhone = false;
            $userEmail = false;

            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $userName = $user['full_name'];
                $userPhone = $user['phone'];
                $userEmail = $user['email'];
            }
            $this->set([
                'title' => 'Кошик',
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'userName' => $userName,
                'userPhone' => $userPhone,
                'userEmail' => $userEmail,
            ]);
        } else {
            $this->doRedirect('/');
        }
    }

    public function checkoutFastAction(): void
    {
        if (!empty($_SESSION['products'])) {
            $productsInCart = Session::get('products');
            $productsCodes = array_keys($productsInCart);
            $products = $this->model->getProductsByCodes($productsCodes);
            $totalPrice = self::getTotalPrice($products);
            $totalQuantity = self::countItems();

            $userName = false;
            $userPhone = false;

            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $userName = $user['full_name'];
                $userPhone = $user['phone'];
            }
            $this->set([
                'title' => 'Кошик',
                'totalPrice' => $totalPrice,
                'totalQuantity' => $totalQuantity,
                'userName' => $userName,
                'userPhone' => $userPhone,
            ]);
        } else {
            $this->doRedirect('/cart');
        }
    }

    public function checkoutSuccessfulAction(): void
    {
        if (!empty($_SESSION['products'])) {
            $productsInCart = Session::get('products');
            $productsCodes = array_keys($productsInCart);
            $products = $this->model->getProductsByCodes($productsCodes);
            $totalPrice = self::getTotalPrice($products);
            $totalQuantity = self::countItems();

            $userName = $_POST['full_name'];
            $userPhone = $_POST['phone'];
            $userEmail = $_POST['email'];
            $userComment = $_POST['comment'];
            $userDelivery = $_POST['delivery'];
            $userPay = $_POST['pay'];

            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']['id'];
            } else {
                $userId = 0;
            }
            $this->model->saveOrder(
                $userName,
                $userPhone,
                $userEmail,
                $userComment,
                $userDelivery,
                $userPay,
                $userId,
                $productsInCart
            );
            $this->set([
                'title' => 'Кошик',
            ]);
            Message::createOrderMessage($userName, $userPhone);
            MailerTransport::sendOrder('New order', Message::$message);
            Message::createUserOrderMessage($userName, $totalQuantity, $totalPrice);
            MailerTransport::sendUserEmail($userEmail, 'New order', Message::$message);
            Session::del('products');
        } else {
            $this->doRedirect('/');
        }
    }

    public function checkoutFastSuccessfulAction(): void
    {
        $this->view = 'checkoutSuccessful';
        if (!empty($_SESSION['products'])) {
            $productsInCart = Session::get('products');
            $userName = $_POST['name'];
            $userPhone = $_POST['phone'];

            if (isset($_SESSION['user'])) {
                $userId = $_SESSION['user']['id'];
            } else {
                $userId = 0;
            }
            $this->model->saveFastOrder(
                $userName,
                $userPhone,
                $userId,
                $productsInCart
            );
            $this->set([
                'title' => 'Кошик',
            ]);
            Message::createOrderMessage($userName, $userPhone);
            MailerTransport::sendOrder('New order', Message::$message);
            Session::del('products');
        } else {
            $this->doRedirect('/');
        }
    }
}
