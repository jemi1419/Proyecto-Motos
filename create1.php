<?php
include("config.php");
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pregunta  = trim($_POST['pregunta'] ?? '');
    $respuesta = trim($_POST['respuesta'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $orden     = filter_var($_POST['orden'] ?? '', FILTER_VALIDATE_INT);

    if (empty($pregunta) || empty($respuesta) || empty($categoria) || $orden === false) {
        $error_msg = "Todos los campos son obligatorios y Orden debe ser un número entero.";
    } else {
        $sql = "INSERT INTO preguntas_frecuentes (pregunta, respuesta, categoria, orden)
                VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $pregunta, $respuesta, $categoria, $orden);
        if ($stmt->execute()) {
            header("Location: FAQ.php");
            exit;
        } else {
            $error_msg = "Error al guardar: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pregunta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body { background-color: #000; color: white; font-family: cursive; }
        .bg-verde { background-color: rgb(165, 3, 3); }
        .card-form { background-color: #1a1a1a; border: 2px solid #d30202ef; padding: 30px; border-radius: 10px; }
        .form-control { background-color: #333; color: white; border-color: #555; font-size: 1rem; }
        .form-control:focus { border-color: #d30202ef; box-shadow: 0 0 0 0.25rem rgba(211, 2, 2, 0.25); }
        .btn-guardar { background-color: #d30202ef; color: white; font-weight: bold; }
        .btn-guardar:hover { background-color: rgb(165, 3, 3); }
    </style>
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
                            <li><a class="dropdown-item" href="FAQ1.php">Preguntas Frecuentes (FAQ)</a></li>
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
        $conexion->close();
    ?>

<header class="container-fluid bg-verde text-center p-5 mb-4">
    <h1 class="fw-bold">Agregar Pregunta</h1>
</header>

<div class="container d-flex justify-content-center">
    <div class="card card-form col-12 col-md-8 col-lg-6">
        <?php if (!empty($error_msg)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error_msg) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Pregunta:</label>
                <textarea name="pregunta" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Respuesta:</label>
                <textarea name="respuesta" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Categoría:</label>
                <input type="text" name="categoria" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Orden:</label>
                <input type="number" name="orden" class="form-control" required>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-guardar btn-lg">Guardar Pregunta</button>
                <a href="FAQ.php" class="btn btn-outline-light btn-lg">Volver al Listado</a>
            </div>
        </form>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
