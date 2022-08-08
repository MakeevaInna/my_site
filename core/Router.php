<?php

namespace Core;

use Base\View;

class Router
{
    protected static array $routes = [];
    protected static array $params = [];

    public static function init(): void
    {
        $arr = require ROOT . '/config/rotes.php';
        foreach ($arr as $key => $val) {
            self::add($key, $val);
        }
    }

    public static function add($route, $params): void
    {
        $route = '#^' . $route . '$#';
        self::$routes[$route] = $params;
    }

    public static function match(): bool
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $url = trim($parsedUrl['path'], '/');
        foreach (self::$routes as $route => $params) {
            if (preg_match($route, $url)) {
                self::$params = $params;
                return true;
            }
        }
        return false;
    }

    public static function run(): void
    {
        if (self::match()) {
            $controller = 'App\Controllers\\' . ucfirst(self::$params['controller']) . 'Controller';
            if (class_exists($controller)) {
                $cObj = new $controller(self::$params);
                $action = self::$params['action'] . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден!";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден!";
            }
        } else {
            View::errorCode();
        }
    }
}
