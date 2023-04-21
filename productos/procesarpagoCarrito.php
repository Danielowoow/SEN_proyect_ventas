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

// Obtener el ID del usuario (reemplaza este valor por el ID real del usuario logueado)
$usuario_id = $_SESSION['id_usuario'];

// Calcular el total del pedido
$total = 0;
foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
    $query_producto = "SELECT * FROM productos WHERE id = $producto_id";
    $result_producto = mysqli_query($conexion, $query_producto);
    $producto = mysqli_fetch_assoc($result_producto);
    $total += $producto['precio'] * $cantidad;
}

// Insertar el pedido en la tabla `pedidos`
$query_pedido = "INSERT INTO pedidos (usuario_id, total) VALUES ($usuario_id, $total)";
$result_pedido = mysqli_query($conexion, $query_pedido);

// Obtener el ID del pedido recién creado
$pedido_id = mysqli_insert_id($conexion);

// Insertar la transacción en la tabla `transacciones`
$query_transaccion = "INSERT INTO transacciones (producto_id, precio, nombre, email, tarjeta, vencimiento, cvv, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
$stmt_transaccion = $conexion->prepare($query_transaccion);

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

    // Agregar el detalle del pedido a la base de datos
    $query_detalle = "INSERT INTO detalles_pedido (pedido_id, producto_id, precio, cantidad) VALUES ($pedido_id, $producto_id, $precio, $cantidad)";
    $result_detalle = mysqli_query($conexion, $query_detalle);

    // Verificar que el detalle del pedido se guardó correctamente
    if (!$result_detalle) {
        // Mostrar mensaje de error
        die("Error al procesar el pedido");
    }
    $fecha = date('Y-m-d H:i:s');
    $query_transaccion = "INSERT INTO transacciones (producto_id, precio, nombre, email, tarjeta, vencimiento, cvv, fecha) VALUES ($producto_id, $precio, '$nombre', '$email', '$tarjeta', '$vencimiento', '$cvv', '$fecha')";
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
}

$stmt_transaccion->close();

// Limpiar el carrito de compras
$_SESSION['carrito'] = array();

// Redirigir a la página de éxito
header('Location: pago_exitoso.php');
exit();
?>
