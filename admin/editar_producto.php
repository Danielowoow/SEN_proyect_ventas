<?php
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

editarProducto($id, $nombre, $precio, $categoria);
header("Location: ver_productos.php");
?>

