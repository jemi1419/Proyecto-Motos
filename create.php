<?php
include("config.php");

if ($_POST) {
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $causa = $_POST['causa'];
    $lesionados = $_POST['lesionados'];
    $uso_casco = $_POST['uso_casco'];
    $nivel_gravedad = $_POST['nivel_gravedad'];

    $imagen = $_POST['imagen_evidencia'];

    $sql = "INSERT INTO accidentes2 
    (fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen_evidencia)
    VALUES 
    ('$fecha', '$lugar', '$descripcion', '$causa', $lesionados, '$uso_casco', '$nivel_gravedad', '$imagen')";

    $conexion->query($sql);
    header("Location: Accidentes.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Accidente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <h2 class="text-center mb-4">Registrar Accidente</h2>

    <form method="POST" class="p-4 bg-secondary rounded">

        <label>Fecha:</label>
        <input type="date" name="fecha" class="form-control mb-3" required>

        <label>Lugar:</label>
        <input type="text" name="lugar" class="form-control mb-3" required>

        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control mb-3" rows="4" required></textarea>

        <label>Causa:</label>
        <input type="text" name="causa" class="form-control mb-3" required>

        <label>Lesionados:</label>
        <input type="number" name="lesionados" class="form-control mb-3" min="0" required>

        <label>Uso de casco:</label>
        <select name="uso_casco" class="form-control mb-3">
            <option value="Sí">Sí</option>
            <option value="No">No</option>
        </select>

        <label>Nivel de gravedad:</label>
        <select name="nivel_gravedad" class="form-control mb-3">
            <option>Leve</option>
            <option>Moderado</option>
            <option>Grave</option>
            <option>Fatal</option>
        </select>

        <label>Link de imagen:</label>
        <input type="text" name="imagen_evidencia" class="form-control mb-3" required placeholder="https://imagen.com/foto.png">

        <button class="btn btn-danger w-100">Guardar</button>
    </form>

    <a href="Accidentes.php" class="btn btn-light w-100 mt-3">Volver</a>
</div>

</body>
</html>
