<?php
include "Model/Task.php";

class TaskController
{
    private $TeamParams = ["id", "name", "description", "estimate", "difficulty", "owner", "createdBy", "state", "project", "createdOn"];
    private $conn;
    private $taskSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->taskSQLFactory = new SQLFactory("Task", $this->TeamParams);
    }

    public function register($params)
    {
        if ($this->isValid($params)) {
            return $this->conn->query($this->taskSQLFactory->generateInsert($params));
        } else {
            return "Error 404";
        }
    }

    public function search($params)
    {
        $result = $this->conn->query($this->taskSQLFactory->generateSelect($params));
        var_dump($result);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($params)
    {
        return $this->conn->query($this->taskSQLFactory->generateUpdate($params, $params["id"]));
    }

    public function delete($params)
    {
        return $this->conn->query($this->taskSQLFactory->generateDelete($params["id"]));
    }

    private function isValid($params)
    {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->TeamParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}