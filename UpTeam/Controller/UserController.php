<?php
include "Model/User.php";
include "Util/DbConnector.php";

class UserController
{
    public function register($request)
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
            $params["level"]
        );
        $db = new DbConnector("localhost", "UpTeam", "mysql", "", "root", "");
        $conn = $db->connect();
        var_dump($conn->query($this->generateInsertQuery($user)));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (name, lastName, password, email, role, birthday, experience, alias, trophies, level) VALUES ('".$user->getName()."','".
                    $user->getLastName()."','".
                    $user->getPassword()."','".
                    $user->getEmail()."','".
                    $user->getRole()."','". 
                    $user->getBirthday()."','".
                    $user->getExperience()."','".
                    $user->getAlias()."','". 
                    $user->getTrophies()."','". 
                    $user->getLevel()."')";
        return $query;                      
    } 
}