<?php

/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 14.05.2017
 * Time: 15:36
 */
class Posts
{
    public function __construct()
    {
        echo "Создался обьект\n" . __CLASS__."\n";
    }
    public function indexAction()
    {
        echo __CLASS__ ." ". __FUNCTION__;
    }
}