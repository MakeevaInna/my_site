<?php

namespace Base;

abstract class Controller
{
    public array $route = [];
    public mixed $view;
    public $layout;
    public array $vars = [];
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel(string $name)
    {
        $path = 'App\Models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path();
        }
    }

    public function getView(): void
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function doRedirect(string $url): void
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->redirect($url);
    }

    public function set($vars): void
    {
        $this->vars = $vars;
    }
}
