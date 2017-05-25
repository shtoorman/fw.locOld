<?php

namespace app\controllers;


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
         $this->layout = 'default';
        //$this->view = 'test';
        $name = 'Sasha';
        $hi = 'Hello';
        $title = 'default layout';
        $colors = [
            'white' => 'белый',
            'black' => 'черный'
        ];
        $this->set(compact('name', 'hi', 'colors', 'title'));//compact — Создает массив, содержащий названия переменных и их значения
    }


}