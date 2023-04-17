<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

// Comprueba si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // Redirecciona al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: http://localhost/SEN_proyect_ventas/login.php");
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> 
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container">
        <h1>Actualizar perfil</h1>
        
        <form action="procesar_acctualizaciones.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>">
            </div>

            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="<?php echo htmlspecialchars($usuario['apellido_paterno']); ?>">
            </div>

            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="<?php echo htmlspecialchars($usuario['apellido_materno']); ?>">
            </div>

            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['correo']); ?>">
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" pattern="\d{8}" title="Por favor, ingrese un DNI válido de 8 dígitos." maxlength="8" value="<?php echo htmlspecialchars($usuario['dni']); ?>">
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo htmlspecialchars($usuario['direccion']); ?>">
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?php echo htmlspecialchars($usuario['ciudad']); ?>">
            </div>

            <div class="form-group">
                <label for="password_actual">Contraseña actual:</label>
                <input type="password" name="password_actual" id="password_actual" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nueva_password">Nueva contraseña:</label>
<input type="password" name="nueva_password" id="nueva_password" class="form-control">
</div>
<div class="form-group">
            <label for="confirmar_password">Confirmar nueva contraseña:</label>
            <input type="password" name="confirmar_password" id="confirmar_password" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
    </form>
    
</div>

<?php include '../includes/footer.php'; ?>
</html>