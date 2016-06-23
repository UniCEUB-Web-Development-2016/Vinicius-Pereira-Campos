<?php
include "Model/Task.php";

class TaskController
{
    private $TeamParams = [ "name", "description", "estimate", "difficulty", "owner", "createdBy", "state", "project", "createdOn"];
    private $conn;
    private $taskSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->taskSQLFactory = new SQLFactory("Task", $this->TeamParams, $conn);
    }

    public function register($params)
    {       $params["createdOn"] = date("Y-m-d");
            $params["createdBy"] = $_SESSION["user"]["ID"];
            return $this->conn->query($this->taskSQLFactory->generateInsert($params));
    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->taskSQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->taskSQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

            case 10:
                $result = $this->conn->query($this->taskSQLFactory->generateSelect($params));
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

        }

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