<?php

include"UserController.php";

class LoginController
{
    private $LoginParams = ["email", "password"];
    private $conn;
    private $loginSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->loginSQLFactory =  new SQLFactory("user", $this->LoginParams);
    }

    public function register($params)
    {

        return $this->conn->query($this->projectSQLFactory->generateInsert($params));


    }

    public function search($params)
    {
        switch (count($params)) {
            case 0:
                $result = $this->conn->query($this->projectSQLFactory->generateSelectAll());
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 1:
                $result = $this->conn->query($this->projectSQLFactory->generateSelectById($params["id"]));
                return $result->fetch(PDO::FETCH_ASSOC);
                break;

            case 6:
                $result = $this->conn->query($this->projectSQLFactory->generateSelect($params));
                return $result->fetchAll(PDO::FETCH_ASSOC);
                break;

        }
    }

    public function update($params)
    {
        return $this->conn->query($this->projectSQLFactory->generateUpdate($params, $params["id"]));
    }

    public function delete($params)
    {
        return $this->conn->query($this->projectSQLFactory->generateDelete($params["id"]));
    }

    private function isValid($params)
    {
        $keys = array_keys($params);
        $diff = array_intersect($keys, $this->ProjectParams);
        if (count($diff) == count($params)) {
            return true;
        }
        return false;
    }
}