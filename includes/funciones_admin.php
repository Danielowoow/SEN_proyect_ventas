
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

  function buscarUsuario($Busqueda) {
  // Conectar a la base de datos
  require_once 'conexion.php';

  // Escapar el término de búsqueda para evitar inyecciones SQL
  $Busqueda = mysqli_real_escape_string($conexion, $Busqueda);

  // Consulta para buscar usuarios que coincidan con el término de búsqueda
  $consulta = "SELECT * FROM usuarios WHERE id LIKE '%$Busqueda%' OR correo LIKE '%$Busqueda%' OR dni LIKE '%$Busqueda%' OR nombre LIKE '%$Busqueda%' OR apellido_paterno LIKE '%$Busqueda%' OR apellido_materno LIKE '%$Busqueda%'";


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

}
function agregar_producto($nombre, $descripcion, $precio, $imagen, $categoria) {
    // Conectar a la base de datos
    include 'conexion.php';
  
    // Escapar los valores para evitar inyecciones SQL
    
  
    // Guardar la imagen en el servidor y obtener la ruta de la imagen
    $ruta_imagen = '';
    if ($imagen['error'] === UPLOAD_ERR_OK) {
      $nombre_imagen = uniqid() . '_' . $imagen['name'];
      $ruta_imagen = 'C:\xampp\htdocs\SEN_proyect_ventas\imagenes\productos' . $nombre_imagen;
      move_uploaded_file($imagen['tmp_name'], $ruta_imagen);
    }
  
    // Insertar el producto en la base de datos
    $consulta = "INSERT INTO productos (nombre, descripcion, precio, imagen, categoria_id) VALUES ('$nombre', '$descripcion', '$precio', '$ruta_imagen', '$categoria')";

    
    if (mysqli_query($conexion, $consulta)) {
      // Si la consulta fue exitosa, devolver true
      return true;
    } else {
      // Si hubo un error en la consulta, mostrar el mensaje de error y devolver false
      echo "Error al agregar producto: " . mysqli_error($conexion);
      return false;
    }
  }
      
  function obtener_productos() {
    include 'conexion.php';

    $sql = "SELECT * FROM productos";
    $result = mysqli_query($conexion, $sql);

    $productos = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }
    }

    return $productos;
}
function loginadmin($email, $password) {
  global $conexion;

  $query = "SELECT * FROM administradores WHERE correo = '$email'";

  $resultado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado) > 0) {
      $usuario = mysqli_fetch_assoc($resultado);
      $stored_password = $usuario['contraseña'];

      if ($password == $stored_password) {
          $_SESSION['id_usuario'] = $usuario['id'];
          $_SESSION['admin_logged_in'] = true; // Agrega esta línea
 
          return true;
      } else {
          return false;
      }
  } else {
      return false;
  }
}