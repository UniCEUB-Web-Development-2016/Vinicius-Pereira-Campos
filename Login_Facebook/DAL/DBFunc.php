<?php
class DBFunc{
    public function Insert(User $user){
        $conn = mysqli_connect('localhost', 'root', '','dbloginfb');


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $sql = "INSERT INTO LoginFacebook (UsrName, UsrLastName, UsrEmail, UsrPassword, UsrBirthday, UserGender)
VALUES ('".$user->getName()."','".$user->getLastName()."','".$user->getEmail()."','".$user->getPassword()."','".$user->getBirthday()."','" . $user->getGender()."')";

        if ($conn->query($sql) === TRUE) {
            header("location: ../View/SuccessLogin.php");
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}