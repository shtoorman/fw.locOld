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

    protected $pk = 'id';//первичный ключ

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
        $sql = "SELECT * FROM  {$this->table}";
        return $this->pdo->query($sql);
    }

    /**
     * ///выбор записи по любому полю
     * @param $id
     * @param string $field
     * @return array
     */
    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    /**
     * @param $str
     * @param $field
     * @param string $table
     * @return array
     */
    public function fineLike($str, $field, $table = '')// str по чему ищем, //field поле //table таблица
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM {$table} WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%', $str, '%']);


    }

}