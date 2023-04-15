<?php
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las contraseñas coincidan
    if ($password != $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Agregar el nuevo usuario a la base de datos
    if (agregarUsuario($email, $password)) {
        echo "Usuario registrado exitosamente.";
        echo "Regresar a la página anterior para iniciar sesión.";
        echo '<li><a class="dropdown-item" href="http://localhost/SEN_proyect_ventas/login.php">Iniciar sesión</a></li>';
    } else {
        echo "Error al registrar el usuario.";
    }
    
}
?>

