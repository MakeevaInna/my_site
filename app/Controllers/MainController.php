<?php

namespace App\Controllers;

use Base\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->set([
        'title' => 'Головна сторінка'
        ]);
    }
}
