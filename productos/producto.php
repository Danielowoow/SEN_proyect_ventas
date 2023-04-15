<?php
include "../includes/conexion.php";
include "../includes/funciones_producto.php";

$id = $_GET['id'];
$producto = obtenerProductoPorId($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $producto['nombre']; ?></title>
</head>
<body>
    <div>
        <h1><?php echo $producto['nombre']; ?></h1>
        <p><?php echo $producto['precio']; ?></p>
        <p><?php echo $producto['descripcion']; ?></p>
        <a href="carrito.php?action=add&id=<?php echo $producto['id']; ?>">Añadir al carrito</a>
    </div>
</body>
</html>

