<?php
include "../model/User.php";
include "../util/FileManager.php";
class UserController{

    public function registerUser($name, $lastname, $email, $password, $birthday){

        $user = new User ($name,$lastname,$email, $password, $birthday);
        $fp = new FileManager();
        $fp->RegisterUser("User.txt",json_encode($user));
    }
}