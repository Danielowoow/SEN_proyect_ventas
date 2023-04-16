
<?php
function eliminarUsuarioPorDNI($dni) {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';
  
    // Crear la consulta SQL para eliminar un usuario por DNI
    $sql = "DELETE FROM usuarios WHERE dni = ?";
  
    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $sql);
  
    // Enlazar el parámetro DNI
    mysqli_stmt_bind_param($stmt, 's', $dni);
  
    // Ejecutar la consulta
    $resultado = mysqli_stmt_execute($stmt);
  
    // Cerrar la declaración y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
  
    // Devolver el resultado (true si se eliminó correctamente, false en caso contrario)
    return $resultado;
  }
function obtenerUsuarios() {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';
  
    // Crear la consulta SQL para seleccionar todos los usuarios
    $sql = "SELECT * FROM usuarios";
  
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);
  
    // Verificar si hay resultados
    if (mysqli_num_rows($resultado) > 0) {
      // Crear un array vacío para almacenar los usuarios
      $usuarios = [];
  
      // Recorrer los resultados y agregarlos al array de usuarios
      while ($usuario = mysqli_fetch_assoc($resultado)) {
        $usuarios[] = $usuario;
      }
  
      // Devolver el array de usuarios
      return $usuarios;
    } else {
      // Si no hay resultados, devolver false
      return false;
    }
  }
