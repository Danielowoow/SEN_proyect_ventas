<?php 
include "../includes/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Obtener el ID del producto a eliminar
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    // Eliminar el producto de la base de datos
    $consulta = "DELETE FROM productos WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        // Redirigir de regreso a la página de ver productos con un mensaje de éxito
        header('Location: admin.php?mensaje=Producto eliminado correctamente');
        exit;
    } else {
        // Si ocurre un error, mostrar un mensaje de error
        echo 'Error al eliminar el producto';
    }
}
