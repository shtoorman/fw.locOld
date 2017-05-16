<?php

namespace vendor\core;
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 12.05.2017
 * Time: 14:03
 */
class Router
{
    /**
     * таблица маршрутов
     * @var array
     */
    protected static $routes = [];

    /**
     * текущий маршрут
     * @var array
     */
    protected static $route = [];


    /**
     *
     * добавляет маршрут в таблицу маршрутов
     *
     * @param string $regexp регулярное выражение маршрута
     * @param array $route маршрут ([controller, action, params])
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * Возвращает таблицу маршрутов
     *
     * @return array
     */
    public static function getRouters()
    {
        return self::$routes;
    }

    /**
     * возвращает текущий маршрут ([controller, action, params])
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * ишет URL в таблице маршрутов
     * @param string $url входяший URL
     * @return bool
     * preg_match — Выполняет проверку на соответствие регулярному выражению
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {//"#..#" - ограничители шаблона,i - модификатор регистра независимый
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index'; // action по умолчанию
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет url по коректному маршруту
     * @param $url
     * @return void
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = self::$route['controller'];
            $controller = self::upperCamelCase($controller);
            if (class_exists($controller)) {
                $cObj = new $controller;
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObj, $action)) {
                    $cObj->$action();
                } else {
                    echo "Метод <b>$action</b> не найден" . "\n";
                }
            } else
                echo "Контроллер <b>$controller</b> не найден" . "\n";
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    {
        $name = str_replace('-', ' ', $name);// - заменяем " "
        $name = ucwords($name);//приводим к вернему регистру 1 букву
        $name = str_replace(' ', '', $name);
        return $name;
    }

    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));

    }

}
