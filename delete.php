<?php
include("config.php");

$id = $_GET['id'];
$conexion->query("DELETE FROM accidentes2 WHERE id=$id");

header("Location: Accidentes.php");

