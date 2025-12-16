<?php
    $conexion = new mysqli('localhost', 'root', '', 'login', '3306');
    $consulta = "SELECT * FROM actu ORDER BY idU ASC LIMIT 1";
    $resultado = $conexion->query($consulta);
    $fila = $resultado->fetch_assoc();
    $us = $fila['us'];
    $ps = $fila['pas'];
    if ( $us == "admin" && $ps =="123" )
    {
        echo "<h1>ADMIN</h1>";
    }
    else
    {
        echo "<h1>USER</h1>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>