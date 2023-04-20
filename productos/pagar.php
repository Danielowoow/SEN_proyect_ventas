<?php
// Incluir archivo de conexión
include '../includes/conexion.php';
// Obtener ID del producto desde la URL
$producto_id = isset($_GET['producto_id']) ? intval($_GET['producto_id']) : 0;

// Obtener información del producto desde la base de datos
$query_producto = "SELECT * FROM productos WHERE id = $producto_id";
$result_producto = mysqli_query($conexion, $query_producto);
$producto = mysqli_fetch_assoc($result_producto);

// Verificar que el producto existe
if (!$producto) {
    die("Producto no encontrado");
}

// Obtener información del usuario desde la sesión o la base de datos
$usuario_id = isset($_SESSION['usuario_id']) ? intval($_SESSION['usuario_id']) : 0;
$query_usuario = "SELECT * FROM usuarios WHERE id = $usuario_id";
$result_usuario = mysqli_query($conexion, $query_usuario);
$usuario = mysqli_fetch_assoc($result_usuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar - <?php echo $producto['nombre']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <section class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $producto['nombre']; ?></h1>
                    <p><?php echo $producto['descripcion']; ?></p>
                    <p>Precio: $<?php echo $producto['precio']; ?></p>
                    <form action="confirmar_pago.php" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($usuario['email']) ? $usuario['email'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tarjeta">Número de tarjeta de crédito</label>
                            <input type="text" name="tarjeta" id="tarjeta" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="vencimiento">Fecha de vencimiento</label>
                            <input type="text" name="vencimiento" id="vencimiento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" id="cvv" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Confirmar pago</button>
                    </form>
                    </div>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>