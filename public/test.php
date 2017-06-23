<?php

require 'rb.php';

$db = require '../config/config_db.php';

R::setup($db['dsn'], $db['user'], $db['password'], $db['opt']);

var_dump(R::testConnection());


//READ
//$cat = R::load('catalog', 2);//type = имя таблицы
//var_dump($cat);
//echo $cat->title;
//echo $cat['title'];

//UPDATE
//$cat = R::load('catalog', 2);//type = имя таблицы
//echo $cat->title . '</br>';
//$cat->title = 'Инструментарий хакера.';
//R::store($cat);
//echo $cat->title . '</br>';

$cat = R::dispense('catalog');
$cat->title = 'Инструментарий хакера 4';
$cat->id = 5;
R::store($cat);
echo $cat->title ;

//DELETE



