<?php
/**
 * Created by PhpStorm.
 * User: Shtoo
 * Date: 25.05.2017
 * Time: 15:54
 */

namespace vendor\core;

/**
 * //Подключение к базе данных
 * Class Db
 * @package vendor\core
 */
class Db
{
    protected $pdo;

    protected static $instance;

    public static $countSql = 0;//Количество выполненных запросов

    public static $queries = [];//Все запросы


    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['password'], $db['opt']);

    }

    /**
     *
     * @return Db
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params =[])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        //echo 'Error occurred:'.implode(":",$this->pdo->errorInfo());
        //print_r($this->pdo->errorInfo());
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);//готовим sql запрос
        $res = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}