<?php
include "Model/User.php";
include "Util/DbConnector.php";
include_once "Util/SQLFactory.php";

class UserController
{
    private $UserParams = ["id","name", "lastName", "password", "email", "role", "birthday", "experience", "alias", "trophies", "level", "cpf"];
    private $userSQLFactory;

    public function __construct()
    {

    }

    public function register($request)
    {
        $params = $request->getParams();
        if ($this->isValid($params)) {
            $user = new User($params["name"],
                $params["lastName"],
                $params["password"],
                $params["email"],
                $params["role"],
                $params["birthday"],
                $params["experience"],
                $params["alias"],
                $params["trophies"],
                $params["level"],
                $params["cpf"]
            );

            $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
            $conn = $db->connect();
            return $conn->query($this->generateInsertQuery($user));
        } else {
            return "Error 404";
        }
    }

    public function search($request)
    {
        $params = $request->getParams();
        $crit = $this->generateCriteria($params);
        $user = new User($params["name"],
            $params["lastName"],
            $params["password"],
            $params["email"],
            $params["role"],
            $params["birthday"],
            $params["experience"],
            $params["alias"],
            $params["trophies"],
            $params["level"],
            $params["cpf"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        $result = $conn->query("SELECT name, lastName, password, email, role, birthday, experience,alias, trophies, level, cpf from user Where " . $crit);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($request)
    {
        $params = $request->getParams();
        $user = new User($params["name"],
            $params["lastName"],
            $params["password"],
            $params["email"],
            $params["role"],
            $params["birthday"],
            $params["experience"],
            $params["alias"],
            $params["trophies"],
            $params["level"],
            $params["cpf"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE USER SET name ='" . $user->getName()
            . "', lastName = '" . $user->getLastName()
            . "', password = '" . $user->getPassword()
            . "', email = '" . $user->getEmail()
            . "', role = '" . $user->getRole()
            . "', birthday = '" . $user->getBirthday()
            . "', experience = '" . $user->getExperience()
            . "', alias = '" . $user->getAlias()
            . "',trophies = '" . $user->getTrophies()
            . "', level =  '" . $user->getLevel()
            . "'Where CPF = '" . $user->getCpf() . "'");

    }

    public function delete($request)
    {
        $params = $request->getParams();
        $user = new User($params["name"],
            $params["lastName"],
            $params["password"],
            $params["email"],
            $params["role"],
            $params["birthday"],
            $params["experience"],
            $params["alias"],
            $params["trophies"],
            $params["level"],
            $params["cpf"]
        );
        $db = new DbConnector("localhost", "dbupteam", "mysql", "", "root", "");
        $conn = $db->connect();
        return $conn->query("UPDATE USER SET active = 1 Where CPF = '" . $user->getCpf() . "'");
    }

    private function generateInsertQuery($user)
    {

        $query = "INSERT INTO user (name, lastName, password, email, role, birthday, experience, alias, trophies, level, cpf) VALUES ('" .
            $user->getName() . "','" .
            $user->getLastName() . "','" .
            $user->getPassword() . "','" .
            $user->getEmail() . "','" .
            $user->getRole() . "','" .
            $user->getBirthday() . "','" .
            $user->getExperience() . "','" .
            $user->getAlias() . "','" .
            $user->getTrophies() . "','" .
            $user->getLevel() . "','" .
            $user->getCpf() . "')";
        return $query;
    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }
        return substr($criteria, 0, -4);
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