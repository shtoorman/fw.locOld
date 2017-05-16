<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 12.05.2017
 * Time: 15:04
 */

function debug($arr, $str = "")
{
    echo '<pre>' . $str . " => " . print_r($arr, true) . '<pre>';
}