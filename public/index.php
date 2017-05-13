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

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

//Router::add('posts/add', ['controller '=> 'Posts','action'=> 'add']);
//Router::add('posts', ['controller '=> 'Posts','action'=> 'index']);
//Router::add('', ['controller '=> 'Main','action'=> 'index']);

Router::add('^$', ['controller ' => 'Main', 'action' => 'index']);//'^$' - рег пустой строки
Router::add('[a-z-]+/[a-z-]+', ['controller => '])

debug(Router::getRouters());

if (Router::matchRoute($query)) {
    debug(Router::getRoute());
} else {
    echo '404';
}
