<?php

/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 14.05.2017
 * Time: 15:47
 */
class PostsNew
{
//    public function __construct()
//    {
//        echo "Создался обьект\n" . __CLASS__ . "\n";
//    }

    public function indexAction()
    {
        echo __CLASS__ ." ". __FUNCTION__;
    }

    public function testAction()
    {
        echo __CLASS__ ." ". __FUNCTION__;
    }

    public function testPageAction()
    {
        echo __CLASS__ ." ". __FUNCTION__;
    }
    public function before()
    {
        echo __CLASS__ ." ". __FUNCTION__;
    }
}
