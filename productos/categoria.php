<?php
// Incluir archivo de conexión
include '../includes/conexion.php';

// Obtener ID de la categoría de la URL
$categoria_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar información de la categoría
$query_categoria = "SELECT * FROM categorias WHERE id = $categoria_id";
$result_categoria = mysqli_query($conexion, $query_categoria);
$categoria = mysqli_fetch_assoc($result_categoria);

// Consultar productos de la categoría
$query_productos = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
$result_productos = mysqli_query($conexion, $query_productos);

// Cerrar la conexión
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categoria ? $categoria['nombre'] : 'Categoría no encontrada'; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <section class="container my-5">
        <title><?php echo $categoria ? $categoria['nombre'] : 'Categoría no encontrada'; ?></title>

            <div class="row">
                <?php while ($producto = mysqli_fetch_assoc($result_productos)): ?>
                    <div class="col-md-4">
                        <div class="card">
                        <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" style="max-width: 450px; max-height: 450px;">
                        

                                 <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                <div class="d-flex justify-content-between">
                                    <span class="price">$<?php echo $producto['precio']; ?></span>
                                    <form action="agregar_al_carrito.php" method="post">
    <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
    <button type="submit" name="accion" value="comprar" class="btn btn-success">Comprar</button>
    <button type="submit" name="accion" value="agregar_al_carrito" class="btn btn-info">Añadir al carrito</button>
</form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>