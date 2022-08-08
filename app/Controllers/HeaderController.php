<?php

namespace App\Controllers;

use Base\Controller;

class HeaderController extends Controller
{
    public function payAction(): void
    {
        $this->set([
            'title' => 'Оплата',
        ]);
    }

    public function deliveryAction(): void
    {
        $this->set([
            'title' => 'Доставка',
        ]);
    }

    public function aboutUsAction(): void
    {
        $this->set([
            'title' => 'Про нас',
        ]);
    }
}
