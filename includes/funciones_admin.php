
<?php

function eliminarUsuario($id) {
    // Conectar a la base de datos
    include 'conexion.php';

    // Ejecutar la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $resultado = $conexion->query($sql);
  
    // Verificar si la consulta se ejecutó correctamente
    if ($resultado) {
      // Mostrar un mensaje de éxito
      echo "El usuario ha sido eliminado correctamente.";
    } else {
      // Mostrar un mensaje de error
      echo "Error al eliminar el usuario: " ;
    }
  
    
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

  function buscarUsuario($termino) {
  // Conectar a la base de datos
  require_once 'conexion.php';

  // Escapar el término de búsqueda para evitar inyecciones SQL
  $termino = mysqli_real_escape_string($conexion, $termino);

  // Consulta para buscar usuarios que coincidan con el término de búsqueda
  $consulta = "SELECT * FROM usuarios WHERE correo LIKE '%$termino%' OR dni LIKE '%$termino%'";

  // Ejecutar la consulta
  $resultado = mysqli_query($conexion, $consulta);

  // Verificar si la consulta fue exitosa
  if ($resultado) {
    // Convertir el resultado en un array asociativo
    $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    // Devolver el array de usuarios
    return $usuarios;
  } else {
    // Si hubo un error en la consulta, mostrar el mensaje de error
    echo "Error al buscar usuarios: " . mysqli_error($conexion);
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}