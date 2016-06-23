<?php

class SQLFactory
{
    private $table;
    private $objectParams;
    private $conn;

    /**
     * @param string $table
     */
    public function __construct($table, $objectParams, $conn)
    {
        $this->setTable($table);
        $this->setObjectParams($objectParams);
        $this->setConn($conn);
    }

    public function generateInsert($params)
    {
        return "INSERT INTO " . $this->table . "(" . $this->generateColumns() . ") VALUES (" . $this->generateValues($params) . ")";

    }

    public function generateSelect($params)
    {
        return "SELECT * FROM " . $this->table . " WHERE " . $this->generateCriteria($params) . " AND active = 0";
    }

    public function generateUpdate($params, $id)
    {
        return "UPDATE " . $this->table . " SET " . $this->generateOverwrite($params) . " WHERE ID = " . $id;
    }

    public function generateDelete($id)
    {
        return "UPDATE " . $this->table . " SET ACTIVE = 1 WHERE ID = " . $id;
    }

    public function generateSelectAll()
    {
        return "SELECT * FROM " . $this->table . $this->generateJoin() . " WHERE " . $this->getTable() . ".active = 0";
    }

    public function generateSelectById($id)
    {
        return "SELECT * FROM " . $this->table . " WHERE ID = " . $id . " AND active = 0";
    }

    private function generateColumns()
    {
        $columns = "";
        foreach ($this->objectParams as $key => $value) {
            $columns = $columns . $value . ", ";
        }
        return substr($columns, 0, -2);
    }

    private function generateValues($params)
    {
        $values = "";
        foreach ($params as $key => $value) {
            if ($key != "id")
                $values = $values . "'" . trim($value) . "', ";
        }
        return substr($values, 0, -2);
    }

    private function generateOverwrite($params)
    {
        $values = "";
        foreach ($params as $key => $value) {
            if ($key != "id")
                $values = $values . $key . " = '" . trim($value) . "', ";
        }
        return substr($values, 0, -2);
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            if ($value != "")
                $criteria = $criteria . $key . " = '" . $value . "' AND ";
        }
        return substr($criteria, 0, -5);
    }

    public function setObjectParams($objectParams)
    {
        $this->objectParams = $objectParams;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getObjectParams()
    {
        return $this->objectParams;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function generateJoin()
    {
        $consulta = "SELECT * FROM config WHERE tblOrigem = '" . $this->getTable() . "'";
        $return = $this->conn->query($consulta);
        $relacionamentos = $return->fetchAll(PDO::FETCH_ASSOC);
        $joins = "";
        foreach ($relacionamentos as $rel) {
            $joins = $joins .  " INNER JOIN " . $rel["tblRelacionamento"] . " ON " . $this->getTable() . "." . $rel["forKey"] . " = " . $rel["tblRelacionamento"] . ".id ";
        }
        return $joins;
    }
}