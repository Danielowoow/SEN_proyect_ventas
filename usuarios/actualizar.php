<?php
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id_usuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    actualizarUsuario($id, $nombre, $email);
    header("Location: perfil.php");
}

$usuario = obtenerUsuarioPorId($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar perfil</title>
</head>
<body>
    <form action="actualizar.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $usuario['nombre']; ?>">
        <input type="email" name="email" placeholder="Email" value="<?php echo $usuario['email']; ?>">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

