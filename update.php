<?php
include("config.php");

$id = $_GET['id'];
$registro = $conexion->query("SELECT * FROM accidentes2 WHERE id=$id")->fetch_assoc();

if ($_POST) {

    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $causa = $_POST['causa'];
    $lesionados = $_POST['lesionados'];
    $uso_casco = $_POST['uso_casco'];
    $nivel_gravedad = $_POST['nivel_gravedad'];

    if ($_POST['imagen_evidencia'] != "") {
        $imagen = $_POST['imagen_evidencia'];
    } else {
        $imagen = $registro['imagen_evidencia'];
    }

    $sql = "UPDATE accidentes2 SET 
            fecha='$fecha',
            lugar='$lugar',
            descripcion='$descripcion',
            causa='$causa',
            lesionados=$lesionados,
            uso_casco='$uso_casco',
            nivel_gravedad='$nivel_gravedad',
            imagen_evidencia='$imagen'
            WHERE id=$id";

    $conexion->query($sql);
    header("Location: Accidentes.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Editar Accidente</title>
</head>

<body class="bg-dark text-white fst-italic">
    <?php
        $conexion = new mysqli('localhost', 'root', '', 'login', '3306');
        $consulta = "SELECT * FROM actu ORDER BY idU ASC LIMIT 1";
        $resultado = $conexion->query($consulta);
        $fila = $resultado->fetch_assoc();
        $us = $fila['us'];
        $ps = $fila['pas'];
        if ( $us == "admin" && $ps =="123" )
        {
            ?>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="INICIO.php">Inicio</a>
                    <a class="navbar-brand" href="Practicas.php">Prácticas Seguras de Conducción</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cascos.php">Tipos de Cascos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="normas.php">Normativa y Reglamento Vial</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Accidentes.php">Accidentes en Motocicleta</a></li>
                            <li><a class="dropdown-item" href="FAQ.php">Preguntas Frecuentes (FAQ)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Compromiso.php">Vista Contacto / Compromiso de Conducción Segura</a></li>
                            <li><a class="dropdown-item" href="#">Lista de Usuarios</a></li>
                        </ul>
                        </li>
                        </ul>
                        <div class="d-flex ms-auto">
                            <a href="logout.php" class="btn btn-danger btn-sm me-3">Cerrar sesión</a>
                            <span class="navbar-text text-white">
                                Usuario: <?php echo $us; ?>
                            </span>
                        </div>

                    </div>
                </div>
            </nav>
            <?php
        }
        else
        {
            ?>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="INICIO.php">Inicio</a>
                    <a class="navbar-brand" href="Practicas.php">Prácticas Seguras de Conducción</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cascos.php">Tipos de Cascos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="normas.php">Normativa y Reglamento Vial</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Accidentes.php">Accidentes en Motocicleta</a></li>
                            <li><a class="dropdown-item" href="FAQ.php">Preguntas Frecuentes (FAQ)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Compromiso.php">Vista Contacto / Compromiso de Conducción Segura</a></li>
                        </ul>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto">
                            <a href="logout.php" class="btn btn-danger btn-sm me-3">Cerrar sesión</a>
                            <span class="navbar-text text-white">
                                Usuario: <?php echo $us; ?>
                            </span>
                        </div>
                    </div>            
                </div>
            </nav>
            <?php
        }
    ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Editar Accidente</h2>

    <form method="POST" class="bg-secondary p-4 rounded">

        <label>Fecha:</label>
        <input type="date" name="fecha" value="<?= $registro['fecha'] ?>" class="form-control mb-3">

        <label>Lugar:</label>
        <input type="text" name="lugar" value="<?= $registro['lugar'] ?>" class="form-control mb-3">

        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control mb-3" rows="4"><?= $registro['descripcion'] ?></textarea>

        <label>Causa:</label>
        <input type="text" name="causa" value="<?= $registro['causa'] ?>" class="form-control mb-3">

        <label>Lesionados:</label>
        <input type="number" name="lesionados" value="<?= $registro['lesionados'] ?>" class="form-control mb-3">

        <label>Uso de casco:</label>
        <select name="uso_casco" class="form-control mb-3">
            <option <?= $registro['uso_casco']=="Sí"?"selected":"" ?>>Sí</option>
            <option <?= $registro['uso_casco']=="No"?"selected":"" ?>>No</option>
        </select>

        <label>Nivel de gravedad:</label>
        <select name="nivel_gravedad" class="form-control mb-3">
            <option <?= $registro['nivel_gravedad']=="Leve"?"selected":"" ?>>Leve</option>
            <option <?= $registro['nivel_gravedad']=="Moderado"?"selected":"" ?>>Moderado</option>
            <option <?= $registro['nivel_gravedad']=="Grave"?"selected":"" ?>>Grave</option>
            <option <?= $registro['nivel_gravedad']=="Fatal"?"selected":"" ?>>Fatal</option>
        </select>

        <label>Link actual de imagen:</label>
        <p><a href="<?= $registro['imagen_evidencia'] ?>" target="_blank"><?= $registro['imagen_evidencia'] ?></a></p>

        <label>Nuevo link (si deseas cambiarlo):</label>
        <input type="text" name="imagen_evidencia" class="form-control mb-3" placeholder="https://ejemplo.com/imagen.png">

        <button class="btn btn-warning w-100">Actualizar</button>
    </form>

    <a href="Accidentes.php" class="btn btn-light w-100 mt-3">Volver</a>

</div>

</body>
</html>
