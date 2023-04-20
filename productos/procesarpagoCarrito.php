
<?php
session_start();
// Incluir archivo de conexión
include '../includes/conexion.php';

// Obtener información del usuario desde el formulario
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : '';
$tarjeta = isset($_POST['tarjeta']) ? mysqli_real_escape_string($conexion, $_POST['tarjeta']) : '';
$vencimiento = isset($_POST['vencimiento']) ? mysqli_real_escape_string($conexion, $_POST['vencimiento']) : '';
$cvv = isset($_POST['cvv']) ? mysqli_real_escape_string($conexion, $_POST['cvv']) : '';

// Realizar la transacción para cada producto en el carrito
foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
    // Obtener información del producto desde la base de datos
    $query_producto = "SELECT * FROM productos WHERE id = $producto_id";
    $result_producto = mysqli_query($conexion, $query_producto);
    $producto = mysqli_fetch_assoc($result_producto);

    // Verificar que el producto existe
    if (!$producto) {
        die("Producto no encontrado");
    }

    // Obtener el precio del producto
    $precio = $producto['precio'];

    // Obtener la fecha actual
    $fecha = date('Y-m-d H:i:s');

    // Agregar la transacción a la base de datos
    $query_transaccion = "INSERT INTO transacciones  (producto_id, precio, nombre, email, tarjeta, vencimiento, cvv, fecha) VALUES ($producto_id, $precio, '$nombre', '$email', '$tarjeta', '$vencimiento', '$cvv', '$fecha')";
    $result_transaccion = mysqli_query($conexion, $query_transaccion);

    // Verificar que la transacción se realizó correctamente
    if (!$result_transaccion) {
        // Mostrar mensaje de error
        die("Error al procesar el pago");
    }
}

// Limpiar el carrito de compras
$_SESSION['carrito'] = array();

// Redirigir a la página de éxito
header('Location: pago_exitoso.php');
exit();
?>
