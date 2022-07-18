<?php

namespace App\Controllers;

use Base\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $params = explode('/', $uri);
    }
}
