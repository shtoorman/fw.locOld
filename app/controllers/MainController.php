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

    //public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;

        $catalog = $model->findAll();
        $catalog1 = $model->findOne(1);
        $catalog3 = $model->findBySql("SELECT * FROM {$model->table} ORDER BY id DESC");
       // debug($catalog1);


        $title = 'книг';
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