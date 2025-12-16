<?php

$conexion = new mysqli("localhost", "root", "", "login");
$conexion->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $conexion->real_escape_string($_POST['marca']);
    $modelo = $conexion->real_escape_string($_POST['modelo']);
    $tipo = $conexion->real_escape_string($_POST['tipo']);
    $certificacion = $conexion->real_escape_string($_POST['certificacion']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $precio_aprox = $conexion->real_escape_string($_POST['precio_aprox']);
    $imagen = $conexion->real_escape_string($_POST['imagen']);

    $insert = "INSERT INTO cascos_info (marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
               VALUES ('$marca', '$modelo', '$tipo', '$certificacion', '$descripcion', '$precio_aprox', '$imagen')";
    $conexion->query($insert);
}

$consulta = "SELECT * FROM cascos_info ORDER BY id ASC";
$resultado = $conexion->query($consulta);
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
  
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="js/bootstrap.bundle.min.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tipos de Cascos para Motociclistas</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
body {
  font-family: cursive;
  background-color: #000;
  color: white;
  margin: 0;
  padding: 0;
  font-style: italic;
}
header {
  background-color: #000;
  color: red;
  padding: 20px;
  text-align: center;
}
main {
  max-width: 900px;
  margin: 30px auto;
  padding: 0 20px;
}
form {
  background: #1a1a1a;
  padding: 20px;
  margin-bottom: 30px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.35);
}
form input, form textarea {
  width: 100%;
  margin-bottom: 10px;
  padding: 8px;
  border-radius: 4px;
  border: none;
  font-family: cursive;
}
form button {
  padding: 10px 15px;
  border: none;
  background: red;
  color: white;
  font-weight: bold;
  cursor: pointer;
  border-radius: 4px;
}
.casco {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  background: #1a1a1a;
  margin-bottom: 30px;
  padding: 15px 20px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.35);
}
.casco img {
  max-width: 250px;
  height: auto;
  margin-right: 20px;
  border-radius: 4px;
  flex-shrink: 0;
}
.info h2 {
  color: #e60000;
}
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
<header>
<h1>Tipos de Cascos para Motociclistas</h1>
<p>Información cargada desde una base de datos MySQL.</p>
</header>
<main>
<?php
if ( $us == "admin" && $ps == "123")
{
  ?>
<form method="POST">

  <h2>Agregar nuevo casco</h2>
  <input type="text" name="marca" placeholder="Marca" required>
  <input type="text" name="modelo" placeholder="Modelo" required>
  <input type="text" name="tipo" placeholder="Tipo" required>
  <input type="text" name="certificacion" placeholder="Certificación" required>
  <textarea name="descripcion" placeholder="Descripción" rows="3" required></textarea>
  <input type="text" name="precio_aprox" placeholder="Precio aproximado" required>
  <input type="text" name="imagen" placeholder="URL de la imagen" required>
  <button type="submit">Agregar Casco</button>
</form>
<?php
}
?>
<?php
$consulta = "SELECT * FROM cascos_info ORDER BY id ASC";
$resultado = $conexion->query($consulta);
?>
<?php while($fila = $resultado->fetch_assoc()): ?>
<div class="casco">
  <img src="<?= $fila['imagen'] ?>" alt="<?= $fila['modelo'] ?>">
  <div class="info">
    <h2><?= $fila['tipo'] ?></h2>
    <p><strong>ID:</strong> <?= $fila['id'] ?></p>
    <p><strong>Marca:</strong> <?= $fila['marca'] ?></p>
    <p><strong>Modelo:</strong> <?= $fila['modelo'] ?></p>
    <p><strong>Certificación:</strong> <?= $fila['certificacion'] ?></p>
    <p><strong>Descripción:</strong> <?= $fila['descripcion'] ?></p>
    <p><strong>Precio aproximado:</strong> <?= $fila['precio_aprox'] ?></p>
    <p><strong>Fecha de registro:</strong> <?= $fila['fecha_registro'] ?></p>
  </div>
</div>
<?php endwhile; ?>
</main>
<footer>
<p>© 2025 Información sobre Seguridad en Motociclismo</p>
</footer>
</body>
</html>
