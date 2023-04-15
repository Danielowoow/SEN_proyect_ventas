<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

// Comprueba si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // Redirecciona al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$usuario = obtenerUsuarioPorId($id_usuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar perfil</title>
</head>
<body>
    <h1>Actualizar perfil</h1>
    <form action="procesar_acctualizaciones.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>">

        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno" id="apellido_paterno" value="<?php echo htmlspecialchars($usuario['apellido_paterno']); ?>">

        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno" id="apellido_materno" value="<?php echo htmlspecialchars($usuario['apellido_materno']); ?>">

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['correo']); ?>">

        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" placeholder="DNI" pattern="\d{8}" title="Por favor, ingrese un DNI válido de 8 dígitos." maxlength="8" value="<?php echo htmlspecialchars($usuario['dni']); ?>">
   

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>">

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>">

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" value="<?php echo htmlspecialchars($usuario['ciudad']); ?>">

        <label for="password_actual">Contraseña actual:</label>
        <input type="password" name="password_actual" id="password_actual" required>

        <label for="nueva_password">Nueva contraseña:</label>
        <input type="password" name="nueva_password" id="nueva_password">

        <label for="confirmar_password">Confirmar nueva contraseña:</label>
        <input type="password" name="confirmar_password" id="confirmar_password">
        
        <button type="submit">Actualizar perfil</button>
    </form>
</body>
</html>