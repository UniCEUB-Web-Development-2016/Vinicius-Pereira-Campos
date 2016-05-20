<?php
include "Model/User.php";
include "Util/DbConnector.php";
include_once "Util/SQLFactory.php";

class UserController
{
    private $UserParams = ["id", "name", "lastName", "password", "email", "role", "birthday", "experience", "alias", "trophies", "level", "cpf"];
    private $userSQLFactory;
    private $conn;

    public function __construct($conn)
    {   
        $this->userSQLFactory = new SQLFactory("user", $this->UserParams);
        $this->conn = $conn;
    }

    public function register($params)
    {
        if ($this->isValid($params)) {
            return $this->conn->query($this->userSQLFactory->generateInsert($params));
        } else {
            return "Error 404";
        }
    }

    public function search($params)
    {
        $result = $this->conn->query($this->userSQLFactory->generateSelect($params));
        return $result->fetch(PDO::FETCH_ASSOC);
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