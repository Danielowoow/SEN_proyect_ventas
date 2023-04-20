<?php
session_start();

include '../includes/conexion.php';

// Verificar que el carrito de compras existe y no está vacío
if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
    echo "<p>No hay productos en el carrito de compras.</p>";
    echo "<p><a href='catalogo.php'>Volver al catálogo de productos</a></p>";
    exit();
}

// Obtener los productos del carrito y el total de la orden
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

// Mostrar los productos en el carrito y el total de la orden

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar carrito de compras</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <section class="container my-5">
            <h1>Pagar carrito de compras</h1>

            <?php if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0): ?>
                <p>No hay productos en el carrito de compras.</p>
                <p><a href="catalogo.php">Volver al catálogo de productos</a></p>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Precio total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['cantidad']; ?></td>
                                <td><?php echo $producto['precio']; ?></td>
                                <td><?php echo $producto['precio_total']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>

                <form method="post" action="procesarpagoCarrito.php">
                    <div class="form-group">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($usuario['email']) ? $usuario['email'] : ''; ?>" required>
                        </div>
                    <div class="form-group">
                        <label for="tarjeta">Número de tarjeta:</label>
                        <input type="text" id="tarjeta" name="tarjeta" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="vencimiento">Fecha de vencimiento:</label>
                        <input type="text" id="vencimiento" name="vencimiento" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" id="cvv" class="form-control" required>
                        </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Pagar</button>
                        <a href="catalogo.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>