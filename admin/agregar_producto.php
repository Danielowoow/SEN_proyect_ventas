<?php


session_start();

include "../includes/conexion.php";
include "../includes/funciones_admin.php";  

// Si se envió el formulario, agregar el producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];       
  $categoria = $_POST['categoria_id'];

  $imagen = $_FILES['imagen'];

  if (agregar_producto($nombre, $descripcion, $precio, $imagen, $categoria)) {
    // Si se agregó el producto correctamente, redirigir a la página de productos
    header("Location: http://localhost/SEN_proyect_ventas/admin/admin.php");
    exit();
  } else {
    // Si hubo un error al agregar el producto, mostrar un mensaje de error
    $mensaje_error = "Error al agregar el producto.";
  }
}

?>
