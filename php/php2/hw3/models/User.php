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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    protected function getTableName()
    {
        return 'user';
    }

    protected function getInsertSql()
    {
        $tableName = $this->getTableName();
        return "INSERT INTO {$tableName} (user_name, user_login, user_password) VALUES ({$this->name}, {$this->login}, {$this->password})";

    }
    protected function getUpdateSql()
    {
        $tableName = $this->getTableName();
        return "UPDATE {$tableName} SET user_name=:name, user_login=:login, user_password=:password  WHERE id=:id";
    }
}
