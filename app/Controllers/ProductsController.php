<?php

namespace App\Controllers;

use Base\Controller;
use Exceptions\IdNotFound;
use Innette\Logger\FileStaticLogger;

class ProductsController extends Controller
{
    public mixed $view;
    public $layout;
    public function productAction(): void
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $code = $uri[1] ?? $uri[0];
        try {
            $product = $this->model->getProduct($code);
            $this->set([
                'title' => 'Товари',
            'content' => $product
            ]);
        } catch (IdNotFound $exception) {
            $this->handleError($exception, 'Товар не знайдено!');
        } catch (\Throwable $exception) {
            $this->handleError($exception, 'Помилка пошуку!');
        }
    }

    public function categoryAction(): void
    {
        $category = trim($_SERVER['REQUEST_URI'], '/');
        $products = $this->model->getProductsAboutCategory($category);
        $this->set([
            'title' => 'Товари',
            'content' => $products
        ]);
    }
    public function productsTypeAction(): void
    {
        $this->view = 'category';
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $type = $uri[1];
        try {
            $products = $this->model->getProductsAboutType($type);
            $this->set([
                'title' => 'Товари',
            'content' => $products
            ]);
        } catch (IdNotFound $exception) {
            $this->handleError($exception, 'Товари не знайдено!');
        } catch (\Throwable $exception) {
            $this->handleError($exception, 'Помилка пошуку!');
        }
    }

    private function handleError(\Throwable $exception, string $message): void
    {
        $this->view = 'notFound';
        $this->set([
            'content' => $message
        ]);
        FileStaticLogger::info($exception->getMessage(), [
            'line' => $exception->getLine(),
            'file' => $exception->getFile()
        ]);
    }

    public function productsAllAction(): void
    {
        $this->layout = 'json';
        try {
            $products = $this->model->getAllProducts();
            echo json_encode($products, JSON_UNESCAPED_UNICODE);
        } catch (IdNotFound $exception) {
            $this->handleError($exception, 'Товари не знайдено!');
        } catch (\Throwable $exception) {
            $this->handleError($exception, 'Помилка пошуку!');
        }
    }

    public function productsAllJsAction(): void
    {
        $this->set([
            'title' => 'Товари',
        ]);
    }
}
