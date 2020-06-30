<?php

namespace box;

class Model
{
    public $tableName = '';
    public $pkName = 'id';

    /** @var \mysqli */
    protected $mysql;

    public function __construct($tableName = null, $pkName = 'id') {
        if (!$this->tableName) {
            $this->tableName = is_null($tableName) ? strtolower(end(explode('\\', static::class))) : $tableName;
        }
        $this->pkName = $pkName;

        $params = Box::$app->params['db'];
        $host = $params['host'];
        $user = $params['user'];
        $password = $params['password'];
        $dbname = $params['dbname'];

        $this->mysql = new \mysqli($host, $user, $password, $dbname);
    }

    public function __destruct() {
        $this->mysql->close();
    }

    public function fetch($whereExpr = '') {
        $mysql = $this->mysql;
        $rows = [];

        if ($whereExpr) {
            $whereExpr = " WHERE $whereExpr";
        }

        $sql = "SELECT * FROM {$this->tableName}{$whereExpr}";

        if ($result = $mysql->query($sql)) {
            while($row = $result->fetch_assoc()) {
                $id = $row[$this->pkName];
                $rows[$id] = $row;
            }

            $result->close();
        }

        return $rows;
    }

    public function append($row = []) {
        $fieldNames = [];
        $fieldValues = [];

        foreach ($row as $key => $value) {
            $fieldNames[] = "`$key`";
            $fieldValues[] = "'$value'";
        }

        $fields = implode(', ', $fieldNames);
        $values = implode(', ', $fieldValues);
        mysqli_query($this->mysql, "INSERT INTO {$this->tableName} ($fields) VALUES ($values)");
    }
}
