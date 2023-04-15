<?php
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

$usuario = obtenerUsuarioPorId($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $usuario['nombre']; ?></h1>
    <a href="actualizar.php">Actualizar perfil</a>
    <a href="../salir.php">Cerrar sesión</a>
</body>
</html>

