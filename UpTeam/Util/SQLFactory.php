<?php

/**
 * Created by PhpStorm.
 * User: vpcam
 * Date: 18/05/2016
 * Time: 19:48
 */
class SQLFactory
{
    private $table;
    private $objectParams;
    public function __construct($table, $objectParams)
    {
        $this->setTable($table);
        $this->setObjectParams($objectParams);
    }

    public function generateInsert($params){
        return "INSERT INTO " . $this->table . "(" . $this->generateColumns($this->objectParams) . ") VALUES (" . $this->generateValues($params) . ")";
    }
    public function generateSelect($params){
        return "SELECT " . $this->generateColumns($this->objectParams) . " FROM " .$this->table . " WHERE " . $this->generateCriteria($params);
    }
    public function generateUpdate($params, $id){
        return "UPDATE " . $this->table . " SET " . $this->generateValues($params) . " WHERE ID = " . $id;
    }
    public function generateDelete($id){
        return "UPDATE " . $this->table . " SET ACTIVE = 1 WHERE ID = " . $id;
    }
    private function generateColumns(){
        $columns = "";
        foreach($this->objectParams as $key => $value){
            $columns = $columns . $value . ", ";
        }
        return substr($columns, 0, -2);
    }
    private function generateValues($params){
        $values = "";
        foreach($params as $key => $value){
            $values = $values . $key ." = " . $value . ", ";
            return substr($values, 0, -2);
        }
    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
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
}