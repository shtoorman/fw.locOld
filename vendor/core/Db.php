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

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['password'], $db['opt']);

    }

    /**
     *
     * @return Db
     */
    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     *
     * @param $sql
     * @return \PDOStatement//28;43
     */
    public function execute($sql){
        echo 'Error occurred:'.implode(":",$this->pdo->errorInfo());
        print_r($this->pdo->errorInfo());
        $stmt = $this->pdo->prepare($sql);
        print_r($this->pdo->errorInfo());
        echo 'Error occurred:'.implode(":",$this->pdo->errorInfo());
         return $stmt->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql){
        $stmt = $this->pdo->prepare($sql);//готовим sql запрос
        $res = $stmt-$this->execute();
        if ($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }
}