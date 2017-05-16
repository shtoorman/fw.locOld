<?php
error_reporting(-1);//контроль ошибок
echo  $test;
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

define('WWW', __DIR__);        //WWW => D:\WAMP\OpenServer\domains\fw.locOld\public
define('CORE', dirname(__DIR__) . '\\vendor\\core');   //CORE => D:\WAMP\OpenServer\domains\fw.locOld\vendor\core
define('ROOT', dirname(__DIR__));  //ROOT => D:\WAMP\OpenServer\domains\fw.locOld
define('APP', dirname(__DIR__) . '\\app');  //APP => D:\WAMP\OpenServer\domains\fw.locOld\app


//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
//require '../app/controllers/Posts.php';
//require '../app/controllers/Main.php';
//require '../app/controllers/PostsNew.php';
debug(WWW, 'WWW');
debug(CORE, 'CORE');
debug(ROOT, 'ROOT');
debug(APP, 'APP');

spl_autoload_register(function ($class) {
    //debug($class,(string)$class);//
    echo $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once "$file";
    }
});


Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts', 'action' => 'index']);


//default routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);//'^$' - рег пустой строки
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');//?P<> именованый ключ

debug(Router::getRouters(), 'getRouters');
Router::dispatch($query);

