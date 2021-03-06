<?php
namespace App\services;
use App\traits\TSingleton;
use App\models\Model;
use PDO;

class BD implements IBD
{
    use TSingleton;

    protected $config = [
      'user' => 'root',
      'pass' => '',
      'driver' => 'mysql',
      'bd' => 'shop',
      'host' => 'localhost:3307',
      'charset' => 'UTF8',
    ];

    /**
     * @var PDO|null
     */
    public $connect = null;

    /**
     * Возвращает только один коннект с базой - объект PDO
     * @return PDO|null
     */
    protected function getConnect()
    {
        if (empty($this->connect)) {

            $this->connect = new PDO(
                $this->getDSN(),
                $this->config['user'],
                $this->config['pass']
            );
            $this->connect->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }
        return $this->connect;
    }

    /**
     * Создание строки - настройки для подключения
     * @return string
     */
    private function getDSN()
    {
        //'mysql:host=localhost;dbname=DB;charset=UTF8'
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s;',
            $this->config['driver'],
            $this->config['host'],
            $this->config['bd'],
            $this->config['charset']
        );
    }

    /**
     * Выполнение запроса
     *
     * @param string $sql 'SELECT * FROM users WHERE id = :id'
     * @param array $params [':id' => 123]
     * @return \PDOStatement
     */
    private function query(string $sql, array $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        $PDOStatement->execute($params);
        var_dump($PDOStatement);
        return $PDOStatement;
    }

    /**
     * Получение одной строки
     *
     * @param string $sql
     * @param array $params
     * @param string $class
     * @return array|mixed
     */
    public function find(string $sql, array $params = [], string $class='')
    {
        return $this->query($sql, $params)->fetchObject($class);
    }

    /**
     * Получение всех строк
     *
     * @param string $sql
     * @param array $params
     * @param string $class
     * @return mixed
     */
    public function findAll(string $sql, array $params = [], string $class='')
    {
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_CLASS,$class);
    }

    /**
     * Выполнение безответного запроса
     *
     * @param string $sql
     * @param array $params
     */
    public function execute(string $sql, array $params = [])
    {
        $this->query($sql, $params);
    }
}
