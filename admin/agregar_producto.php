<?php
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

agregarProducto($nombre, $precio, $categoria);
header("Location: ver_productos.php");
?>

