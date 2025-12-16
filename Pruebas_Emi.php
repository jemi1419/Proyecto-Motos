<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href ="css/bootstrap.min.css">  
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
                    
                    <a class="navbar-brand" href="#">Prácticas Seguras de Conducción</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="#">Tipos de Cascos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Normativa y Reglamento Vial</a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Más</a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Accidentes en Motocicleta</a></li>
                                <li><a class="dropdown-item" href="#">Preguntas Frecuentes (FAQ)</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Vista Contacto / Compromiso de Conducción Segura</a></li>
                                <li><a class="dropdown-item" href="#">Lista de usuarios</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="d-flex ms-auto">
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
                    <a class="navbar-brand" href="#">Prácticas Seguras de Conducción</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Tipos de Cascos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Normativa y Reglamento Vial</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Accidentes en Motocicleta</a></li>
                            <li><a class="dropdown-item" href="#">Preguntas Frecuentes (FAQ)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Vista Contacto / Compromiso de Conducción Segura</a></li>
                        </ul>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto">
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
    <form action="", method = "post">
        <input type="submit" value = "a">
    </form>
    <?php
        if ( $_SERVER["REQUEST_METHOD"] == "POST")
        {
            header("Location: in.php");
            exit();
        }    
    ?>
    <script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>