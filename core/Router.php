<?php

namespace Core;

class Router
{
    protected static $routes = []; //таблица маршрутов
    protected static $route = []; //текущий маршрут
    protected static $params = [];

    public function __construct()
    {
        $arr = require ROOT . '/config/rotes.php';
        foreach ($arr as $key => $val) {
            self::add($key, $val);
        }
    }

    public static function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        self::$routes[$route] = $params;
    }

    public static function match()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $url = trim($parsedUrl['path'], '/');
        foreach (self::$routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                self::$params = $params;
                return true;
            }
        }
        return false;
    }

    public static function run()  //перенаправляет url по корректному маршруту
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
            http_response_code(404);
            include ROOT . 'public/404.html';
        }
    }
}
