
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
  

// ... otras funciones de productos
