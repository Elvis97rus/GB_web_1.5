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
    protected function getUpdateSql()
    {
        $tableName = $this->getTableName();
        return "UPDATE {$tableName} SET good_name=:name, good_price=:price, good_description=:info WHERE id=:id";
    }

}