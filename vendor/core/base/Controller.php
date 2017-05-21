<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 16.05.2017
 * Time: 17:59
 */

namespace vendor\core\base;

/**
 * Class Controller
 * @package vendor\core\base
 */

abstract class Controller
{
    /**
     * текущий маршрут и параметры (controller, action, params)
     * @var array
     */
    private $route = [];

    /**
     *  вид
     * @var
     */
    private $view;

    /**
     * текущий шаблон
     * @var string
     */
    private $layout;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
//        include APP. "/views/{$route['controller']}/{$this->view}.php";
//        echo "Создался обьект\n" . __CLASS__ . "\n";
    }

    /**
     * Создаем обьект Вид
     *
     */
    public function getView()
    {
        $vObj = new View($this->route,  $this->layout , $this->view);
        $vObj->render();
    }
}