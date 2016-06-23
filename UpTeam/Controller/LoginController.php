<?php


class LoginController
{
    private $LoginParams = ["email", "password"];
    private $conn;
    private $loginSQLFactory;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->loginSQLFactory = new SQLFactory("user", $this->LoginParams, $conn);
        session_cache_expire(30);
        $cache_expire = session_cache_expire();
        session_start();
    }

    public function register($params)
    {

        $result = $this->conn->query($this->loginSQLFactory->generateSelect($params));
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $return["isLogged"] = false;
            $return["message"] = "Error 403: Forbidden";
            return $return;
        } else {
            $_SESSION["isLogged"] = true;
            $user["isLogged"] = $_SESSION["isLogged"];
            $_SESSION["user"] = $user;
            return $user;
        }
    }

    public function search($params)
    {
        return $_SESSION["isLogged"];
    }

    public function update($params)
    {
        return $_SESSION["user"];
    }

    public function delete($params)
    {
        unset($_SESSION["user"]);
        unset($_SESSION["isLogged"]);
        return session_destroy();
    }


}