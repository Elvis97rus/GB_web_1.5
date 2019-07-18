<?php
namespace App\models;

class User extends Model
{
    protected $id;
    protected $name;
    protected $login;
    protected $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->password;
    }

    /**
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    protected function getTableName()
    {
        return 'user';
    }

    protected function getInsertSql()
    {
        $tableName = $this->getTableName();
        return "INSERT INTO {$tableName} (user_name, user_login, user_password) VALUES (:name, :login, :password)";

    }
}
