<?php
include_once "Model/Project.php";

class ProjectController
{
    private $ProjectParams = ["id", "name", "team", "createdOn", "estimatedDeadline", "description"];
    private $conn;
    private $projectSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->projectSQLFactory = new SQLFactory("Project", $this->ProjectParams);
    }

    public function register($params)
    {
        if ($this->isValid($params)) {
            return $this->conn->query($this->projectSQLFactory->generateInsert($params));
        }
        else {
            return "Error 404";
        }
    }

    public function search($params)
    {
        $result = $this->conn->query($this->$this->projectSQLFactory->generateSelect($params));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($params)
    {
        return $this->conn->query($this->projectSQLFactory->generateUpdate($params,$params["id"]));
    }

    public function delete($params)
    {
        return $this->conn->query($this->projectSQLFactory->generateDelete($params["id"]));
    }

    private function isValid($params) {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->ProjectParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}