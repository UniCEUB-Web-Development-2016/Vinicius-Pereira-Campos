<!DOCTYPE html>
<html>
<head>
    <title>Aula 4</title>
</head>
<body>

<h1>Calculate Circle Area</h1>
<form action="Controller/CalculateCircleArea.php" method="post">
    <label>Radius:</label>
    <input type="text" name="radius"/>
    <input type="submit" value="Calcular"/>
</form>
<h1> Calculate Hipotenusa</h1>
<form action="Controller/CalculateHipotenusa.php" method="post">
    <label>Cateto Adjacente:</label>
    <input type="text" name="catetoadj"/>
    <br/>
    <br/>
    <label>Cateto Oposto:</label>
    <input type="text" name="catetoopst"/>
    <br/>
    <br/>
    <input type="submit" value="Calcular">
</form>
</body>
</html>