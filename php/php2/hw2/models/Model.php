<?php
namespace App\models;
use App\services\BD;

abstract class Model
{

    /**
     * @var BD Класс для работы с БД
     */
    protected $bd;

    public function __construct(BD $bd)
    {
        $this->bd = $bd;
    }

    abstract protected function getTableName();

    /**
     * @param $id
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} where id={$id}";
        $this->bd->find($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $this->bd->find($sql);
    }
}