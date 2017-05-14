<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 12.05.2017
 * Time: 13:50
 */
//Эта функция возвращает строку str
// с удаленными из конца строки пробельными (или другими) символами.
$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __FILE__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__FILE__));
define('APP', dirname(__FILE__ . '/app'));

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
require '../app/controllers/Posts.php';
require '../app/controllers/Main.php';
require '../app/controllers/PostsNew.php';

spl_autoload_register(function ($class){
    $file = APP."/controllers/$class.php";
    if (is_file($file)){
        require_once "$file";
    }
});

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);//'^$' - рег пустой строки
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');//?P<> именованый ключ

debug(Router::getRouters(), 'getRouters');
Router::dispatch($query);

