<?php

namespace Base;

use Core\DB;

abstract class Model
{
    protected $dbConnection;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->dbConnection = DB::getDbObject();
    }

    public function query($sql)
    {
        return $this->dbConnection->execute($sql);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->dbConnection->query($sql);
    }

//    public function findOne($id, $field = '')
//    {
//        $field = $field ?: $this->pk;
//        $sql = "SELECT * FROM {$this->table} where $field = ?";
//        return $this->dbConnection->query($sql, [$id]);
//    }
}
