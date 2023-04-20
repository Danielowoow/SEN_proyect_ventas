<?php
session_start();
include '../includes/conexion.php';

// Verificar que el carrito de compras existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Obtener los productos del carrito
$productos = array();
$total = 0;
foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
    // Obtener información del producto desde la base de datos
    // Aquí se asume que el archivo "../includes/conexion.php" ya ha sido incluido
    $query = "SELECT * FROM productos WHERE id = $producto_id";
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);

    // Calcular el precio total del producto (precio x cantidad)
    $precio_total = $producto['precio'] * $cantidad;

    // Agregar el producto al array de productos
    $productos[] = array(
        'id' => $producto_id,
        'nombre' => $producto['nombre'],
        'precio' => $producto['precio'],
        'cantidad' => $cantidad,
        'precio_total' => $precio_total
    );

    // Sumar el precio total del producto al total de la orden
    $total += $precio_total;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <section class="container my-5">
            <h1>Carrito de compras</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Precio total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo number_format($producto['precio'], 2); ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><?php echo number_format($producto['precio_total'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"><strong>Total:</strong></td>
                        <td><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <a href="catalogo.php" class="btn btn-primary">Continuar comprando</a>
                <a href="pagarcarrito.php" class="btn btn-success">Pagar</a>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
