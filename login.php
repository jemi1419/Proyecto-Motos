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
        <h1 class="login-title">Login</h1>

        <div class="input-box">
            <input type="text" name="login" placeholder="Username">
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="password">
        </div>
        
        <input type="submit" value = "Login" class="login-btn"></input>
        <a href="registro.php" class="login-btn" style="margin-top:10px; display:block; text-align:center;">Registrar</a>
    </form>
    <?php
        if ( $_SERVER["REQUEST_METHOD"] == "POST")
        {
            $conexion = new mysqli("localhost", "root", "", "login");
            $con = "SELECT * FROM Actu";
            $rs = $conexion->query($con);
            if ( $rs->num_rows >= 1 )
            {
                header("Location: logout.php");
                exit();
            }
            $usuario = $_POST['login'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM Usuarios WHERE Login = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) 
            {
                $fila = $resultado->fetch_assoc();
                if ($fila['Password'] === $password) 
                {
                    $ins = "INSERT INTO actu(idU, us, pas) VALUES (1, '$usuario', '$password')";
                    $lis = $conexion->query($ins);
                    header("Location: INICIO.php");
                    exit();
                } 
                else 
                {
                    echo "<h2 style='color: red;'>Usuario o contraseña incorrectos</h2>";
                }
            } 
            else {
                echo "<h2 style='color: red;'>Usuario o contraseña incorrectos</h2>";
            }
            $conexion->close();        
        }    
        
    ?>
</body>
</html>