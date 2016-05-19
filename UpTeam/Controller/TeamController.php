<?php
include_once "Model/Team.php";

class TeamController
{
    private $TeamParams = ["id", "name", "createdOn", "createdBy"];
    private $teamSQLFactory;
    private $conn;

    public function __construct($conn)
    {   
        $this->teamSQLFactory = new SQLFactory("team", $this->TeamParams);
        $this->conn = $conn;
    }
    public function register($params)
    {
        if ($this->isValid($params)) {
            return $this->conn->query($this->teamSQLFactory->generateInsert($params));
        }
        else {
            return "Error 404";
        }
    }

    public function search($params)
    {
        $result = $this->conn->query($this->teamSQLFactory->generateSelect($params));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($params)
    {
        return $this->conn->query($this->teamSQLFactory->generateUpdate($params));
    }

    public function delete($params)
    {
        return $this->conn->query($this->teamSQLFactory->generateDelete($params, $params["id"]));
    }

    private function isValid($params) {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->TeamParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}