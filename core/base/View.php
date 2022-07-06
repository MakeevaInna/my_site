<?php

namespace Base;

class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT; //если не было передано значение - используется константа с дефолтным знач
        $this->view = $view;
    }

    public function render($vars)
    {
        if (is_array($vars)) {
            extract($vars); //извлекаем ключ-значение из массива и делаем из них переменная-значение
        };
        $file_view = APP . "/Views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "Не найден $file_view"; // exception
        }
        $content = ob_get_clean();
        $file_layout = APP . "/Views/layouts/{$this->layout}.php";
        if (is_file($file_layout)) {
            require $file_layout;
        } else {
            echo "Не найден $file_layout"; // exception
        }
    }
}
