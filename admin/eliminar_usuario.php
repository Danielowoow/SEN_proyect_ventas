<?php
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

$id = $_GET['id'];

eliminarUsuario($id);
header("Location: ver_usuarios.php");
?>

