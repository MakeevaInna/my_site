<?php

namespace App\Controllers;

use Base\Controller;

class CartController extends Controller
{
    public function addAction()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $id = trim($parsedUrl['query'], '/');
        debug($id);
    }
}
