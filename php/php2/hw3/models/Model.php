<?php
namespace App\models;

use App\services\BD;

abstract class Model
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bd = BD::getInstance();
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();
    abstract protected function getInsertSql();
    abstract protected function getUpdateSql();


    public function save(){
        if (!$this->id){
            $sql = $this->getInsertSql();
            return $this->bd->execute($sql);
        }
        else{
            $sql = $this->getUpdateSql();
            return $this->bd->execute($sql);
        }
    }

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->bd->find($sql, [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->bd->findAll($sql);
    }

    public function getProperties()
    {
        $properties = [];
        foreach ($this as $key => $value) {
            $properties[] = $key;
        }
        var_dump($properties);
    }
}
