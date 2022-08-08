<?php

namespace App\Controllers;

use Base\Controller;

class MainController extends Controller
{
    public function indexAction(): void
    {
        $products = $this->model->getNewProducts();
        $this->set([
            'title' => 'Головна сторінка',
            'content' => $products
        ]);
    }
}
