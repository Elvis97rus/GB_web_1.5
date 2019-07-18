<?php
namespace App\models;

class Good extends Model
{
    public $id;
    public $price;
    public $name;
    public $info;

    protected function getTableName()
    {
        return 'goods';
    }
    protected function getInsertSql()
    {
        $tableName = $this->getTableName();
        return "INSERT INTO {$tableName} (good_name, good_price, good_description) VALUES (:name, :price, :info)";

    }
}