<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Normas de Seguridad Vial</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      font-family: cursive;
      background-color: #000000;
      color: white;
      margin: 0;
      padding: 0;
      font-style: italic;
    }
    header {
      background-color: #000000;
      color: red;
      padding: 20px;
      text-align: center;
    }
    header .intro {
      font-size: 1.1em;
      margin-top: 10px;
    }
    main {
      max-width: 900px;
      margin: 30px auto;
      padding: 0 20px;
    }
    ol.normas {
      list-style-position: inside;
      padding: 0;
    }
    ol.normas li {
      background: #1a1a1a;
      margin-bottom: 30px;
      padding: 15px 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.35);
    }
    ol.normas li h3 {
      margin-top: 0;
      color: #e60000;
    }
    hr.separador {
      border: none;
      height: 4px;
      background-color: #3f3f3f;
      margin: 40px 0;
      width: 100%;
    }
    footer {
      text-align: center;
      padding: 15px;
      background-color: #000000;
      color: #ffccf9;
      margin-top: 30px;
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
  <header>
    <h1>Normas de Seguridad Vial para Conductores</h1>
    <p class="intro">La seguridad en las carreteras depende de la responsabilidad de todos los conductores. Aquí encontrarás diez normas esenciales para prevenir accidentes y proteger vidas.</p>
  </header>

  <main>
    <ol class="normas">
      <li>
        <h3>No conducir bajo los efectos del alcohol o drogas</h3>
        <p>Conducir bajo estas influencias es una de las principales causas de accidentes graves. Si planeas consumir, opta por un conductor designado, transporte público o taxi.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Uso del cinturón de seguridad</h3>
        <p>Es obligatorio y fundamental para proteger a los ocupantes en caso de accidente. Todos los pasajeros deben usarlo. Los niños deben viajar en sillas infantiles adecuadas.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Respeta los límites de velocidad</h3>
        <p>Están diseñados para protegerte según el tipo de vía y reducir el riesgo y gravedad de accidentes.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>No usar el teléfono móvil</h3>
        <p>Las distracciones al volante son una de las principales causas de accidentes. Si necesitas usarlo, detén el vehículo en un lugar seguro.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Mantenimiento del vehículo</h3>
        <p>Revisiones periódicas garantizan que frenos, luces, neumáticos y demás componentes funcionen correctamente.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Señalización y uso de luces</h3>
        <p>Utiliza luces direccionales antes de cualquier maniobra y usa las luces del vehículo en condiciones de baja visibilidad.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Respeta los semáforos y señales de tráfico</h3>
        <p>Están diseñadas para regular el tránsito y evitar situaciones de riesgo. Obedécelas siempre.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Distancia de seguridad</h3>
        <p>Mantén una distancia prudente con el vehículo de adelante para reaccionar ante imprevistos.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Educación y conciencia</h3>
        <p>Mantente informado sobre normas de tráfico y seguridad. La educación es clave para mejorar la convivencia vial.</p>
      </li>

      <hr class="separador">

      <li>
        <h3>Descansa en viajes largos</h3>
        <p>Haz pausas cada dos horas para evitar la fatiga. Descansar reduce el riesgo de accidentes.</p>
      </li>
    </ol>
  </main>

  <footer>
    <p>Seguridad Vial</p>
  </footer>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
