<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_admin.php";
$id_usuario = $_POST['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id'];
    $usuario = obtenerUsuarioPorIda($id_usuario);

    if (!$usuario) {
        echo "No se pudo obtener la información del usuario.";
        exit;
    }

    // Actualizar la información del usuario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    
    $nueva_password = $_POST['nueva_password'];
    $confirmar_password = $_POST['confirmar_password'];

    // Comprobar si se ingresó una nueva contraseña y si coincide con la confirmación
    if (!empty($nueva_password) && $nueva_password !== $confirmar_password) {
        echo "Las contraseñas nuevas no coinciden";

        exit;
    }

    // Si se ingresó una nueva contraseña, actualizarla
    if (!empty($nueva_password)) {
        $hashed_password = password_hash($nueva_password, PASSWORD_DEFAULT);
    } else {
        $hashed_password = $usuario['contraseña'];
    }

    // Actualizar la información del usuario en la base de datos
    adminActualizarUsuario($id_usuario, $nombre, $apellido_paterno, $apellido_materno, $email, $dni, $fecha_nacimiento, $direccion, $ciudad, $hashed_password);
    header("Location: http://localhost/SEN_proyect_ventas/admin/admin.php");
    exit();
    //echo "Perfil actualizado correctamente";
    // Redirigir al perfil o a otra página si lo deseas
    //echo '<li><a class="button" href="http://localhost/SEN_proyect_ventas/admin/admin.php">perfil actualizado</a></li>';


}