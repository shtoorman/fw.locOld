<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 25.05.2017
 * Time: 15:51
 */

return [
    'dsn' => 'mysql:host=localhost; dbname=bookshop; charset=utf8',
    'user' => 'root',
    'password' => '',
    'opt' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]
];