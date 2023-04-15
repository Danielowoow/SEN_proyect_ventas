<?php
include 'includes/conexion.php';
include 'includes/funciones.php';

// Verificar si el usuario tiene permisos para acceder a esta página
// verificar_permisos();

// Obtener el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
} else {
    header("Location: admin/ver_productos.php");
    exit();
}

// Eliminar el producto de la base de datos
$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_producto);

if ($stmt->execute()) {
    // Producto eliminado correctamente
    header("Location: admin/ver_productos.php?mensaje=producto_eliminado");
} else {
    // Error al eliminar el producto
    header("Location: admin/ver_productos.php?mensaje=error_eliminar");
}

$stmt->close();
$conexion->close();

