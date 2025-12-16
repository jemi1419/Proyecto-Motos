<?php
    $conexion = new mysqli('localhost', 'root', '', 'login', '3306');
    $consulta = "DELETE FROM actu WHERE idU >= 1";
    $rs = $conexion->query($consulta);
    $conexion -> close();
    header("Location: login.php");
    exit();
    $conexion -> close();
?>