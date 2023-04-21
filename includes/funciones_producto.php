
<?php
// Aquí puedes incluir funciones relacionadas con los productos.
// Por ejemplo:

function obtenerTodasCategoriasProducto() {
    include 'conexion.php';
    global $conexion;
  
    $consulta = "SELECT * FROM categorias ORDER BY nombre ASC";
  
    $resultado = mysqli_query($conexion, $consulta);
  
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }
  
    $categorias = array();
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $categoria;
    }
  
    return $categorias;
  }
  

  function obtenerProductos() {
    global $conexion;

    $query = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $query);

    $productos = array();
    while ($producto = mysqli_fetch_assoc($resultado)) {
        $productos[] = $producto;
    }

    mysqli_free_result($resultado);

    return $productos;
}
// ... otras funciones de productos
