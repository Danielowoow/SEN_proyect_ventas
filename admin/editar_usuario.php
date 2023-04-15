<?php
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

$id = $_GET['id'];

eliminarProducto($id);
header("Location: ver_productos.php");
?>

