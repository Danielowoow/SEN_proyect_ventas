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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> 
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
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
            <li><strong>Contraseña:</strong> ********</li>
        </ul>
        <a href="actualizar.php">Editar perfil</a>
        <a href="../salir.php">Cerrar sesión</a>
    </div>
    <?php include '../includes/footer.php'; ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 20px;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-size: 20px;
            margin-right: 20px;
        }   
    </style>
</body>
</html>