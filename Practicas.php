<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas Seguras de Conducción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* Aplicamos la fuente Cursiva (Dancing Script) a todo el body */
        body {
            font-family: cursive; 
            background-color: #1a1a1a; 
            color: #f8f9fa; /* Texto general blanco */
        }
        /* Ajustamos el tamaño de fuente para mejor lectura en cursiva */
        body, .card-text, .list-group-item {
            font-size: 1.2rem;
        }
        /* Las tarjetas de Bootstrap también necesitan fondo oscuro */
        .card {
            background-color: #212529 !important;
        }
        /* Los elementos de lista necesitan fondo oscuro y texto claro */
        .list-group-item {
            background-color: #212529 !important;
            color: #f8f9fa !important;
            border-color: #495057 !important; /* Bordes de lista grises para contraste */
        }
        /* Las descripciones de las tarjetas */
        .card-text {
            color: #ced4da !important;
        }
        /* El título principal */
        .display-4 {
            font-size: 3rem; 
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
            <h1 class="display-4 text-danger">🚦 Prácticas Seguras de Conducción</h1>
            <p class="lead text-light">Consejos esenciales para un viaje seguro y responsable.</p>
        </header>
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
            
            <div class="col">
                <div class="card shadow-sm h-100 border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger"><i class="bi bi-eye-fill me-2"></i>Concentración y Vigilancia</h5>
                        <p class="card-text">La atención constante es la herramienta más importante del conductor.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-phone-off-fill text-danger me-3"></i>
                                Evita distracciones: Nunca uses el celular.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-clock-fill text-warning me-3"></i>
                                Regla de los 3 segundos: Mantén una distancia segura con el vehículo de adelante.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-droplet-half text-dark me-3"></i>
                                Conduce sobrio: No manejes bajo la influencia del alcohol o drogas.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm h-100 border-secondary">
                    <div class="card-body">
                        <h5 class="card-title text-secondary"><i class="bi bi-speedometer2 me-2"></i>Velocidad y Maniobras</h5>
                        <p class="card-text">Controla la velocidad y comunica tus intenciones claramente.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-exclamation-triangle-fill text-danger me-3"></i>
                                Respeta límites: Ajusta tu velocidad a las condiciones climáticas y de tráfico.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-arrow-left-right text-info me-3"></i>
                                Señaliza: Usa direccionales antes de cambiar de carril o girar.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-x-octagon-fill text-warning me-3"></i>
                                Puntos ciegos: Revisa los espejos y gira la cabeza antes de adelantar.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm h-100 border-secondary">
                    <div class="card-body">
                        <h5 class="card-title text-secondary"><i class="bi bi-shield-fill-check me-2"></i>Seguridad Pasiva y Activa</h5>
                        <p class="card-text">Asegura que tu vehículo y tú estén listos para cualquier eventualidad.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-bandaid-fill text-danger me-3"></i>
                                Cinturón de seguridad: Obligatorio para todos los ocupantes en todo momento.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-gear-fill text-secondary me-3"></i>
                                Mantenimiento: Revisa regularmente frenos, luces y presión de los neumáticos.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-sun-fill text-warning me-3"></i>
                                Uso de luces: Enciéndelas al atardecer, amanecer o con mal tiempo.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card shadow-sm h-100 border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger"><i class="bi bi-wrench-adjustable-circle-fill me-2"></i>Mantenimiento Preventivo</h5>
                        <p class="card-text">Clave para la fiabilidad y seguridad de tu vehículo.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-circle-fill text-dark me-3"></i>
                                Revisión de neumáticos: Presión, desgaste y alineación adecuados.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-water text-primary me-3"></i>
                               Fluidos y frenos: Verificación y relleno regular del sistema.
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-lightbulb-fill text-warning me-3"></i>
                                Luces y señalización: Asegura su correcto funcionamiento (faros, direccionales, freno).
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div> <footer class="text-center mt-5 pt-3 border-top">
            <p class="text-light small">© 2025 Información de Seguridad Vial.</p>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>