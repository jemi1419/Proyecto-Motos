<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>
<body>
    <form action="" method="post" class="login-form">
        <h1 class="login-title">Registro</h1>

        <div class="input-box">
            <input type="text" name="Name" placeholder="Name">
        </div>
        <div class="input-box">
            <input type="text" name="Apellidos" placeholder="Apellidos">
        </div>
        <div class="input-box">
            <input type="text" name="Username" placeholder="Username">
        </div>

        <div class="input-box">
            <input type="password" name="Password" placeholder="password">
        </div>
        
        <button type="submit" class="login-btn">Registrar</button>
        <a href="login.php" class="login-btn" style="margin-top:10px; display:block; text-align:center;">Regresar al Login</a>
    </form>
    <?php
        if ( $_SERVER["REQUEST_METHOD"] == "POST" )
        {
            $nam = $_POST["Name"];
            $us = $_POST["Username"];
            $ps = $_POST["Password"];
            $ape = $_POST["Apellidos"];
            $conexion = new mysqli('localhost', 'root', '', 'login', '3306');
            $sel = "SELECT * FROM Usuarios WHERE Login = '$us'";
            $rs = $conexion->query($sel);
        
            if ($rs->num_rows >= 1) 
            {
                echo "<h2 style='color: red;'>El usuario ya está registrado</h2>";
            } 
            else 
            {
                $in = "INSERT INTO Usuarios (Nombre, Apellidos, Login, Password) 
                       VALUES ('$nam', '$ape', '$us', '$ps')";
                if ($conexion->query($in) === TRUE) 
                {
                        header("Location: login.php");
                        exit();
                } 
                else            
                {
                    echo "<h2 style='color:red;'>Error al registrar: " . $conexion->error . "</h2>";    
                }
            }
            $conexion->close();
        }
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>