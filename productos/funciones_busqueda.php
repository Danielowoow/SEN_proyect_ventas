
<?php
function buscarProductos($busqueda) {
    global $conexion;

    // Preparar la consulta SQL
    $query = "SELECT * FROM productos WHERE nombre LIKE ? OR descripcion LIKE ?";
    $stmt = $conexion->prepare($query);

    // Vincular los parámetros
    $busqueda_con_comodines = '%' . $busqueda . '%';
    $stmt->bind_param("ss", $busqueda_con_comodines, $busqueda_con_comodines);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $resultado = $stmt->get_result();

    // Crear un array para almacenar los productos encontrados
    $productos = array();

    // Rellenar el array con los productos encontrados
    while ($producto = $resultado->fetch_assoc()) {
        $productos[] = $producto;
    }

    // Liberar recursos y cerrar la conexión
    $resultado->free();
    $stmt->close();

    // Devolver los productos encontrados
    return $productos;
}

