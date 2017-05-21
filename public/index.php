<?php
error_reporting(-1);//контроль ошибок
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 12.05.2017
 * Time: 13:50
 */
//Эта функция возвращает строку str
// с удаленными из конца строки пробельными (или другими) символами.
$query = rtrim($_SERVER['QUERY_STRING'], '/');

use vendor\core\Router;


require '../vendor/libs/functions.php';

define('WWW', __DIR__);        //WWW => D:\WAMP\OpenServer\domains\fw.locOld\public
define('CORE', dirname(__DIR__) . '\\vendor\\core');   //CORE => D:\WAMP\OpenServer\domains\fw.locOld\vendor\core
define('ROOT', dirname(__DIR__));  //ROOT => D:\WAMP\OpenServer\domains\fw.locOld
define('APP', dirname(__DIR__) . '\\app');  //APP => D:\WAMP\OpenServer\domains\fw.locOld\app
define('LAYOUT','default');// дефолтный шаблон

spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once "$file";
    }
});


Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);


//default routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);//'^$' - рег пустой строки
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');//?P<> именованый ключ

Router::dispatch($query);

