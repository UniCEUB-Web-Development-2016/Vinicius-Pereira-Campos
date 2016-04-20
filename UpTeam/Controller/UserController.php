<?php
include "Model/User.php";

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
            $params["trophies"]
        );
        return var_dump($user);
    }
}