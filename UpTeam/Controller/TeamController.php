<?php
include_once "Model/Team.php";

class TeamController
{
    private $TeamParams = ["id", "name", "createdOn", "createdBy"];
    private $teamSQLFactory;
    private $conn;

    public function __construct($conn)
    {   
        $this->teamSQLFactory = new SQLFactory("team", $this->TeamParams, $conn);
        $this->conn = $conn;
    }
    public function register($params)
    {
        $params["createdOn"] = date("Y-m-d");
        $params["createdBy"] = $_SESSION["user"]["ID"];
            return $this->conn->query($this->teamSQLFactory->generateInsert($params));
    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->teamSQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->teamSQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

            case 4:
                $result = $this->conn->query($this->teamSQLFactory->generateSelect($params));
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

        }
    }

    public function update($params)
    {
        return $this->conn->query($this->teamSQLFactory->generateUpdate($params, $params["id"]));
    }

    public function delete($params)
    {
        return $this->conn->query($this->teamSQLFactory->generateDelete($params["id"]));
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