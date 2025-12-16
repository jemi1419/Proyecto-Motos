<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compromiso de Conducción Segura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
         body {
            font-family: cursive; 
            background-color: #1a1a1a; 
            color: #f8f9fa;
            font-size: 1.2rem; 
        }
        
        .display-4, .lead {
            color: #dc3545 !important; /
        }
       
        .form-control, .form-check-label {
            background-color: #212529; 
            color: #f8f9fa;
            border-color: #dc3545; 
        }
       
        .form-control::placeholder {
            color: #6c757d;
        }
     
        .form-label {
            color: #f8f9fa;
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
        $conexion->close();
    ?>

    <div class="container my-5">
        
        <header class="text-center mb-5">
            <h1 class="display-4"> Compromiso de Conducción Segura</h1>
            <p class="lead">Yo, el abajo firmante, me comprometo a seguir prácticas de conducción responsables.</p>
        </header>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <form class="p-4 border border-danger rounded shadow-lg bg-dark">
                    
                    <div class="mb-4">
                        <h4 class="text-danger border-bottom pb-2">Declaración de Responsabilidad Vial</h4>
                        <p class="text-light">
                            Declaro mi compromiso formal de: 
                            <br>• Respetar siempre los límites de velocidad.
                            <br>• Nunca conducir bajo la influencia de sustancias.
                            <br>• Evitar el uso del teléfono móvil mientras opero un vehículo.
                            <br>• Mantener una distancia segura (Regla de los 3 segundos).
                            <br>• Asegurar el uso del cinturón de seguridad por todos los pasajeros.
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre Completo del Conductor:</label>
                        <input type="text" class="form-control" id="nombreCompleto" placeholder="Escribe tu nombre aquí" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de Compromiso:</label>
                        <input type="date" class="form-control" id="fecha" required>
                    </div>

                    <div class="mb-4">
                        <label for="firma" class="form-label">Firma:</label>
                        <div class="form-control" id="firma" style="height: 80px; border-bottom: 2px solid #dc3545; background-color: #212529;">
                            </div>
                        <small class="form-text text-light">Tu firma digital o manuscrita aquí simboliza la aceptación del compromiso.</small>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="aceptaCompromiso" required>
                        <label class="form-check-label text-light" for="aceptaCompromiso">
                            Confirmo que he leído y acepto incondicionalmente todos los puntos de este Compromiso de Conducción Segura.
                        </label>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-lg">Aceptar y Firmar Compromiso</button>
                    </div>
                </form>
                
            </div>
        </div>

        <footer class="text-center mt-5 pt-3 border-top border-danger">
            <p class="text-light small">© 2025 Documento de Seguridad Vial.</p>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>