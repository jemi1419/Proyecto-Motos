<?php
$servername = "localhost"; 
$username = "root"; 
$password_db = ""; 
$dbname = "LOGIN"; 
$port = "3306"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Login</title>
       <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: cursive; 
        }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(satoru.png); 
            background-size: cover;
            background-position: center;
            color: white; 
        }
        .container {
            background-color: rgb(64, 64, 64, 0.15);
            border: 3px solid rgba(255, 255, 255, 0.3);
            padding: 40px;
            border-radius: 16px;
            backdrop-filter: blur(25px);
            text-align: center;
            box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, 0.5);
            max-width: 95%;
            width: 1200px; 
            overflow-x: auto; 
            text-align: left; 
        }
        .error-message {
            font-size: 24px;
            color: #ffcccc;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
if (isset($_POST['login']) && isset($_POST['password'])) 
    {
    $login_ingresado = $_POST['login'];
    $password_ingresado = $_POST['password'];
    $conn = new mysqli($servername, $username, $password_db, $dbname);
    if ($conn->connect_error) 
    {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $sql_login = "SELECT password FROM Usuarios WHERE login = ?";
    $stmt = $conn->prepare($sql_login);
    $stmt->bind_param("s", $login_ingresado);
    $stmt->execute();
    $result_login = $stmt->get_result();
    $login_exitoso = false;
    if ($result_login->num_rows === 1) 
        {
        $row = $result_login->fetch_assoc();
        $password_almacenada = $row['password'];

        if ($password_ingresado === $password_almacenada) 
            {
                $login_exitoso = true;
            }
        }
    $stmt->close();
    if ($login_exitoso) 
        {
        echo "<h1>Bienvenido(a), $login_ingresado.</h1>";
        echo "<h2>Lista de Docentes</h2>";
        $sql_docentes = "SELECT IdDocente, Nombre, Apellidos, Titulo, Email, Telefono FROM Docentes";
        $result_docentes = $conn->query($sql_docentes);
        if ($result_docentes->num_rows > 0) {
            echo "<table>";
            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Título</th><th>Email</th><th>Teléfono</th></tr></thead>";
            echo "<tbody>";
            while($row_docente = $result_docentes->fetch_assoc()) 
            {
                echo "<tr>";
                echo "<td>" . $row_docente["IdDocente"] . "</td>";
                echo "<td>" . $row_docente["Nombre"] . "</td>";
                echo "<td>" . $row_docente["Apellidos"] . "</td>";
                echo "<td>" . $row_docente["Titulo"] . "</td>";
                echo "<td>" . $row_docente["Email"] . "</td>";
                echo "<td>" . $row_docente["Telefono"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } 
        else 
        {
            echo "<p>No hay docentes registrados en la base de datos.</p>";
        }
    } 
    else
    {
        echo "<h1 class='error'>DATOS INCORRECTOS</h1>";
        echo "<p class='error'>El usuario o la contraseña no son válidos.</p>";
    }
    $conn->close();
} else 
{
    echo "<p>Por favor, usa el formulario de <a href='login.html'>login</a> para acceder.</p>";
}
?>
</body>
</html>