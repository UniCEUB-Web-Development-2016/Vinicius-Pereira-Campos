<?php

include '../Model/Math.php';

$math = new Math();

echo($math->getHipotenusa($_POST["catetoopst"],$_POST["catetoadj"]));