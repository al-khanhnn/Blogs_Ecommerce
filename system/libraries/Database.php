<?php

class Database extends PDO
{
    public function __construct($connect, $user, $password)
    {
        parent::__construct($connect, $user, $password);
    }

    /**
     * @param $sql
     * @param $data
     * @param $fetchStyle
     * @return array|false
     */
    public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindParam($key, $value);
        }

        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * @param $table
     * @param $data
     * @return bool
     */
    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(':$key', $value);
        }

        return $statement->execute();
    }

    /**
     * @param $table
     * @param $data
     * @param $condition
     * @return bool
     */
    public function update($table, $data, $condition)
    {
        $updateKeys = Null;

        foreach ($data as $key => $value) {
            $updateKeys .= '$key=:$key,';
        }

        $updateKeys = rtrim($updateKeys, ',');

        $sql = "UPDATE $table SET $updateKeys WHERE $condition";
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(':$key', $value);
        }
        return $statement->execute();
    }

    /**
     * @param $table
     * @param $condition
     * @param $limit
     * @return false|int
     */
    public function delete($table, $condition, $limit = 1)
    {
        $sql = "DELETE FROM $table WHERE $condition LIMIT $limit";
        return $this->exec($sql);
    }
}
