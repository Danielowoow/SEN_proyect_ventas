<?php

session_start();
include "../includes/conexion.php";
include "../includes/funciones_admin.php";
// Obtener el ID del usuario enviado por el formulario
$id = $_POST['id'];

// Eliminar el usuario de la base de datos
eliminarUsuario($id);

// Redirigir al usuario de vuelta a la página de usuarios
header("Location: http://localhost/SEN_proyect_ventas/admin/admin.php");
exit();
?>