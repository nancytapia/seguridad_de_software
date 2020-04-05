<?php
$msg = null;
if (isset($_POST["login"]))
{
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    
    $usuarios = array
        (
        "javier" => "1234",
        "manuel" => "1234",
        "rosa" => "1234"
        );
    
    foreach($usuarios as $clave => $valor)
    {
        if ($usuario == $clave && $password == $valor)
        {
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("location: foro.php");
        }
        else
        {
            $msg = "Error al iniciar sesión";
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h1> Login de usuarios</h1>
<strong><?php echo $msg ?></strong>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <table>
       <tr>
        <td>Usuario:</td>
        <td><input type="text" name="usuario"></td>
       </tr>
              <tr>
        <td>Password:</td>
        <td><input type="password" name="password"></td>
       </tr>
    </table>
    <input type="hidden" name="login">
    <input type="submit" value="Iniciar sesión">
</form>
</body>
</html>