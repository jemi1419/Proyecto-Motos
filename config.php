<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "LOGIN";

$conexion = new mysqli($host, $user, $pass, $db, '3306');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
