<?php
include "UserController.php";

$uc = new UserController();
$uc->registerUser($_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["password"],$_POST["birthday"]);