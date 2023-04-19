<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

$id_producto = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria_id = $_POST['categoria_id'];

if (actualizarProducto($id_producto, $nombre, $descripcion, $precio, $categoria_id)) {
    header("Location: admin.php");
} else {
    echo "Error al actualizar el producto.";
}