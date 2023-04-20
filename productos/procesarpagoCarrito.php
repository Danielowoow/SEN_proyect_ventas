
<?php
session_start();
// Incluir archivo de conexión
include '../includes/conexion.php';

// Obtener información del producto desde la base de datos
$producto_id = isset($_POST['producto_id']) ? intval($_POST['producto_id']) : 0;
$query_producto = "SELECT * FROM productos WHERE id = $producto_id";
$result_producto = mysqli_query($conexion, $query_producto);
$producto = mysqli_fetch_assoc($result_producto);

// Verificar que el producto existe
if (!$producto) {
    die("Producto no encontrado");
}

// Obtener información del usuario desde el formulario
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, $_POST['email']) : '';
$tarjeta = isset($_POST['tarjeta']) ? mysqli_real_escape_string($conexion, $_POST['tarjeta']) : '';
$vencimiento = isset($_POST['vencimiento']) ? mysqli_real_escape_string($conexion, $_POST['vencimiento']) : '';
$cvv = isset($_POST['cvv']) ? mysqli_real_escape_string($conexion, $_POST['cvv']) : '';

// Realizar la transacción
$precio = $producto['precio'];
$fecha = date('Y-m-d H:i:s');
$query_transaccion = "INSERT INTO transaccionesCarrito (producto_id, precio, nombre, email, tarjeta, vencimiento, cvv, fecha) VALUES ($producto_id, $precio, '$nombre', '$email', '$tarjeta', '$vencimiento', '$cvv', '$fecha')";
$result_transaccion = mysqli_query($conexion, $query_transaccion);

// Verificar que la transacción se realizó correctamente
if ($result_transaccion) {
    // Redirigir a la página de éxito
    header('Location: pago_exitoso.php');
    exit();
} else {
    // Mostrar mensaje de error
    die("Error al procesar el pago");
}
