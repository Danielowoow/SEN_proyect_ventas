<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

$id_producto = $_POST['id'];

$producto = obtenerProductoPorId($id_producto);
if (!$producto) {
    echo "No se pudo obtener la información del producto.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> 
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container">
        <h1>Editar producto</h1>
        
        <form action="procesar_actualizacionProducto.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id_producto; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" min="0" value="<?php echo htmlspecialchars($producto['precio']); ?>">
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    <?php $categorias = obtenerTodasCategorias(); ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>"<?php if ($categoria['id'] == $producto['categoria_id']) { echo ' selected'; } ?>><?php echo htmlspecialchars($categoria['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" onclick='return confirm("¿Está seguro de editar este producto?");'>Actualizar producto</button>
        </form>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
