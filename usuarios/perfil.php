<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = obtenerUsuarioPorId($_SESSION['id_usuario']);

if (!is_array($usuario)) {
    echo "Error: usuario no encontrado";
    exit();
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $usuario['nombre']; ?></h1>
    <ul>
        <li><strong>Correo:</strong> <?php echo $usuario['correo']; ?></li>
        <li><strong>DNI:</strong> <?php echo $usuario['dni']; ?></li>
        <li><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></li>
        <li><strong>Apellido Paterno:</strong> <?php echo $usuario['apellido_paterno']; ?></li>
        <li><strong>Apellido Materno:</strong> <?php echo $usuario['apellido_materno']; ?></li>
        <li><strong>Fecha de nacimiento:</strong> <?php echo $usuario['fecha_nacimiento']; ?></li>
        <li><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></li>
        <li><strong>Ciudad:</strong> <?php echo $usuario['ciudad']; ?></li>
    </ul>
    <a href="editar_perfil.php">Editar perfil</a>
    <a href="../salir.php">Cerrar sesión</a>
</body>
</html>