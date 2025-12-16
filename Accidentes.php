<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accidentes de motos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body { background-color: #000; color: white; font-family: cursive; }
        .bg-verde { background-color: rgb(165, 3, 3); }
        .bg-rojo { background-color: #d30202ef; }
        th { background-color: #d30202ef; }
        td { background-color: #1a1a1a; color: white; }
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
        $conexion->close();
    ?>

<header class="container-fluid bg-verde text-center p-5 mb-4">
    <h1 class="fw-bold">Los accidentes de motos</h1>
    <p>Ten conciencia de tu vida</p>
</header>

<div class="container mb-3 text-end">
    <?php
            if ( $us == "admin" && $ps == "123")
            {
                ?>
                <a href="create.php" class="btn btn-danger fw-bold">Registrar accidente</a>
            <?php
            }
        ?>
    
</div>

<div class="container">
    <h2 class="text-center mb-4">Historial de Accidentes</h2>

    <table class="table table-bordered table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Causa</th>
            <th>Lesionados</th>
            <th>Uso casco</th>
            <th>Gravedad</th>
            <th>Imagen</th>
            <?php
                if ( $us == "admin" && $ps == "123")
                {
                    ?>
                    <th>Acciones</th>
                    <?php
                }
            ?>
        </tr>

        <?php
        $conexion = new mysqli('localhost', 'root', '', 'login', '3306');
        $datos = $conexion->query("SELECT * FROM accidentes2 ORDER BY id DESC");
        $consulta = "SELECT * FROM actu ORDER BY idU ASC LIMIT 1";
        $resultado = $conexion->query($consulta);
        $fila = $resultado->fetch_assoc();
        $us = $fila['us'];
        $ps = $fila['pas'];
        while ($fila = $datos->fetch_assoc()) { ?>
        
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['fecha'] ?></td>
            <td><?= $fila['lugar'] ?></td>
            <td><?= $fila['causa'] ?></td>
            <td><?= $fila['lesionados'] ?></td>
            <td><?= $fila['uso_casco'] ?></td>
            <td><?= $fila['nivel_gravedad'] ?></td>
            <td>
                <img src="<?= htmlspecialchars($fila['imagen_evidencia']) ?>" width="120" alt="Evidencia">
            
            
                <?php
                if ( $us == "admin" && $ps == "123")
                {
                    ?>
                    <td>
                    <a href="update.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                    <?php
                    }
                ?>
            </td>
        </tr>

        <?php } ?>
    </table>
</div>

<footer class="text-center mt-4 p-3 bg-verde text-white fw-bold">
    © 2025 accidentes de motos
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
