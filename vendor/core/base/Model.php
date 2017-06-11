<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 26.05.2017
 * Time: 16:22
 */

namespace vendor\core\base;

use vendor\core\Db;

abstract class Model
{
    protected $pdo; //обьект pdo подключение к бд

    protected $table; //имя таблицы

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    /**
     * //Метод обертка над методом execute() класса Db;
     */
    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    /**
     * //возвращает все данные с некой тоблицы
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT FROM fw.{$this->table}";
        return $this->pdo->query($sql);
    }
}