<?php
include("config.php");

$id = $_GET['id'] ?? null;
if ($id) {
    $conexion->query("DELETE FROM preguntas_frecuentes WHERE id=$id");
}

header("Location: FAQ.php");
exit;
?>
