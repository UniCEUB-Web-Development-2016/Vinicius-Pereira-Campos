<?php
include '../Model/User.php';
include '../DAL/DBFunc.php';


$user = new User($_POST['Name'], $_POST['LastName'],$_POST['Password'],$_POST['usrEmail'], $_POST['birthday'], $_POST['gender']);
$db = new DBFunc();
$returnDB = $db->Insert($user);
if ($returnDB === true) {
    header("location: ../View/SuccessLogin.php");
} else {
    echo $returnDB;
}




