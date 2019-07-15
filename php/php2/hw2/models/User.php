<?php
namespace App\models;
use App\services\BD;
class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;

    protected function getTableName()
    {
        return 'users';
    }
}