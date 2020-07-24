<?php
// Router

namespace Rest\System;
use Rest\Action\NotFoundAction;

class Router {
    protected static $routes;

    public static function routeAdd(string $name, string $url, array $params, string $action) {
        $pattern = str_replace('/', '\/', $url);
        $pattern = '/' . '(' . ')' . $pattern . '$/';

        foreach($params as $key => $value) {
            $pattern = str_replace($key, $value, $pattern);
        }

        self::$routes[$name] = ['pattern' => $pattern, 'class' => $action];
    }

    public static function enableRouter($url) {
        $class = new NotFoundAction();
        
        foreach (self::$routes as $route) {
            if (preg_match($route['pattern'], $_SERVER['REQUEST_METHOD'] . $url)) {
                $class = new $route['class'];
            }
        }

        return $class();
    }

    public static function getRoutes() {       
        return self::$routes;
    }
}