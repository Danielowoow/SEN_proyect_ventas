<?php
include "../includes/conexion.php";
include "../includes/funciones_producto.php";

$orden = $_GET['orden'];
$productos = ordenarProductos($orden);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos ordenados por <?php echo $orden; ?></title>
</head>
<body>
    <div>
        <?php foreach ($productos as $producto): ?>
        <div>
            <h3><?php echo $producto['nombre']; ?></h3>
            <p><?php echo $producto['precio']; ?></p>
            <a href="producto.php?id=<?php echo $producto['id']; ?>">Ver detalles</a>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

