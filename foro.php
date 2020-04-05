<?php
session_start();
$usuario = $_SESSION["usuario"];
$conexion = new mysqli("localhost", "root", "", "xss");
$msg = null;
if(isset($_POST["nuevo_comentario"]))
{
    require "input-filter/class.inputfilter.php";
    /*ETIQUETAS QUE DESEAMOS PERMITIR EN ELE COMENTARIO*/
    $filter = new InputFilter(array('b', 'i', 'img'), array('src'));
    $titulo = $filter->process($_POST["titulo"]);
    $comentario = $filter->process($_POST["comentario"]);
    

    $sql = "INSERT INTO comentarios (usuario, titulo, comentario) VALUES ";
    $sql .= "('$usuario', '$titulo', '$comentario')";
    $resultado = $conexion->query($sql);
    if ($resultado)
    {
        $msg = "Enhorabuena comentario publicado con éxito";
    }
    else
    {
        $msg = "Ha ocurrido un error al crear el comentario";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h1>Pagina Principal</h1>
<strong><?php echo $msg ?></strong>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <table>
        <tr>
            <td>Título:</td>
            <td><input type="text" name="titulo"></td>
        </tr>
                <tr>
            <td>Comentario:</td>
            <td><textarea cols="50" rows="10" name="comentario"></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="nuevo_comentario">
    <input type="submit" value="Enviar">
</form>
<?php
$sql = "SELECT * FROM comentarios";
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_array())
{
    echo "Usuario:" . $fila["usuario"] . "<br>";
    echo "Título:" . $fila["titulo"] . "<br>";
    echo "Comentario:" . $fila["comentario"] . "<br><br><hr>";    
}
?>
</html>
