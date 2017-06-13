<?php

namespace app\controllers;

use app\models\Main;


/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 14.05.2017
 * Time: 15:36
 */
class MainController extends AppController
{

    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;
//        $res = $model->query("CREATE TABLE users( id_user int(10) AUTO_INCREMENT,
//                              name VARCHAR (20) NOT NULL ,
//                              PRIMARY KEY  (id_user))");
        $catalog = $model->findAll();



        $title = 'PAGE TITLE';
        $this->set(compact('title','catalog'));//28:48


//         $this->layout = 'default';
//        //$this->view = 'test';
//        $title = 'default layout';
//        $colors = [
//            'white' => 'белый',
//            'black' => 'черный'
//        ];
//        $this->set(compact('name', 'hi', 'colors', 'title'));//compact — Создает массив, содержащий названия переменных и их значения
    }


}