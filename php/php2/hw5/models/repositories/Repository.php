<?php
namespace App\models\repositories;

use App\models\entities\Entity;
use App\services\BD;

/**
 * Class Repository
 * @package App\models\repositories
 */
abstract class Repository
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Entity constructor.
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

    abstract protected function getEntityName();

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
        return $this->bd->queryObject(
            $sql,
            $this->getEntityName(),
            [':id' => $id]
        );
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->bd->queryObjects($sql, $this->getEntityName());
    }
    //INSERT INTO users(fio, login, password) VALUES (:fio, :login, :password)

    protected function insert($user)
    {
        $columns = [];
        $params = [];
        foreach ($user as $key => $value) {
            if ($key == 'bd') {
                continue;
            }
            $columns[] = $key;
            $params[":{$key}"] = $value;
        }
        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columnsString})
          VALUES ({$placeholders})";
        $this->bd->execute($sql, $params);
        $this->id = $this->bd->lastInsertId();
    }

    protected function update($user) {
        $params = [];
        $pairs = [];
        foreach ($user as $key => $value) {
            if ($key == 'bd') {
                continue;
            }
            $params[":{$key}"] = $value;
            $pairs[] = "{$key} = :{$key}";
        }
        $setString = implode(', ', $pairs);
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET ({$setString}) WHERE {$tableName}.id=:id}";
        $this->bd->execute($sql, $params);
    }

    public function save($user) {
        if (empty($user->id)) {
            $this->insert($user);
            return;
        }
        $this->update($user);
        return;
    }

    public function delete(Entity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id ";
        $this->bd->execute($sql, [':id' => $entity->id]);
    }
}
