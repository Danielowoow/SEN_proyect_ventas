<?php
// Incluir archivo de conexión
include '../includes/conexion.php';

// Obtener la cadena de búsqueda del formulario
$cadena_busqueda = isset($_GET['busqueda']) ? mysqli_real_escape_string($conexion, $_GET['busqueda']) : '';

// Obtener todos los productos que contienen la cadena de búsqueda en su nombre o descripción
$query = "SELECT * FROM productos WHERE nombre LIKE '%$cadena_busqueda%' OR descripcion LIKE '%$cadena_busqueda%'";
$resultado = mysqli_query($conexion, $query);

// Obtener el número de resultados
$num_resultados = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">  
    
</head>

<body>
<?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <section class="productos-alea my-5">
        <div class="container">
            <h2 class="text-center mb-4">Resultados de búsqueda</h2>
            <div class="row">
                <?php if ($num_resultados > 0): ?>
                    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                        <div class="col-md-4">
                            <div class="card">
                            <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" style="max-width: 450px; max-height: 450px;">
                                
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                    <div class="d-flex justify-content-between">
                                        <span class="price">$<?php echo $producto['precio']; ?></span>
                                        <form action="productos/agregar_al_carrito.php" method="post">
                                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                            <button type="submit" name="accion" value="comprar" class="btn btn-success">Comprar</button>
                                            <button type="submit" name="accion" value="agregar_al_carrito" class="btn btn-info">Añadir al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
            <?php else: ?>
                <p>No se encontraron resultados para "<?php echo $cadena_busqueda; ?>"</p>
            <?php endif; ?>
            </div>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>
</body>
</html>

