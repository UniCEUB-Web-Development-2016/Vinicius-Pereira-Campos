<?php
include "Model/User.php";
include_once "Util/SQLFactory.php";

class UserController
{
    private $UserParams = ["name","password", "email", "role", "birthday", "experience","level", "health"];
    private $userSQLFactory;
    private $conn;

    public function __construct($conn)
    {   
        $this->userSQLFactory = new SQLFactory("user", $this->UserParams, $conn);
        $this->conn = $conn;
    }

    public function register($params)
    {

            $params["experience"] = 0;
            $params["level"] = 0;
            $params["Health"] = 100;
            return $this->conn->query($this->userSQLFactory->generateInsert($params));

    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->userSQLFactory->generateSelectAll());
                break;

            case 1:
                $result = $this->conn->query($this->userSQLFactory->generateSelectById($params["id"]));
                break;

            default :
                $result = $this->conn->query($this->userSQLFactory->generateSelect($params));
                break;

        }
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($params)
    {
        return $this->conn->query($this->userSQLFactory->generateUpdate($params, $params["id"]));

    }

    public function delete($params)
    {
        return $this->conn->query($this->userSQLFactory->generateDelete($params["id"]));
    }

    private function isValid($params)
    {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->UserParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}