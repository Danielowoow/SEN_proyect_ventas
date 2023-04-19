
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
function obtenerUsuarioPorId($id_usuario) {
  global $conexion;

  $query = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
  $resultado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado) > 0) {
      return mysqli_fetch_assoc($resultado);
  } else {
      return false;
  }
}
function obtenerUsuarioPorIda($id_usuario) {
  global $conexion;
  // Mensaje de depuración
  echo "ID del usuario en obtenerUsuarioPorId: {$id_usuario}<br>";

     

  $query = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
  $resultado = mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado) > 0) {
      return mysqli_fetch_assoc($resultado);
  } else {
      return false;
  }
}

function agregar_producto($nombre, $descripcion, $precio, $imagen, $categoria) {
    // Conectar a la base de datos
    include 'conexion.php';
  
    // Escapar los valores para evitar inyecciones SQL
    
  
    // Guardar la imagen en el servidor y obtener la ruta de la imagen
// Guardar la imagen en el servidor y obtener la ruta de la imagen
$ruta_imagen = '';
if ($imagen['error'] === UPLOAD_ERR_OK) {
  $nombre_imagen = uniqid() . '_' . $imagen['name'];
  $ruta_imagen = 'imagenes/productos/produc' . $nombre_imagen;
  $ruta_absoluta = 'C:\xampp\htdocs\SEN_proyect_ventas\\' . $ruta_imagen;
  move_uploaded_file($imagen['tmp_name'], $ruta_absoluta);
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
    
  
  function buscarProducto($nombre, $precioMin, $precioMax, $categoria) {
    include 'conexion.php';
    global $conexion;

    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $precioMin = mysqli_real_escape_string($conexion, $precioMin);
    $precioMax = mysqli_real_escape_string($conexion, $precioMax);
    $categoria = mysqli_real_escape_string($conexion, $categoria);

    $consulta = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre AS categoria_nombre FROM productos JOIN categorias ON productos.categoria_id = categorias.id WHERE productos.nombre LIKE '%$nombre%'";

    if (!empty($precioMin)) {
        $consulta .= " AND productos.precio >= $precioMin";
    }

    if (!empty($precioMax)) {
        $consulta .= " AND productos.precio <= $precioMax";
    }

    if (!empty($categoria)) {
        $consulta .= " AND productos.categoria_id = $categoria";
    }

    $consulta .= " ORDER BY productos.precio ASC";

    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    $productos = array();
    while ($producto = mysqli_fetch_assoc($resultado)) {
        $productos[] = $producto;
    }

    return $productos;
}
function obtenerTodosProductos() {
  include 'conexion.php';
  global $conexion;

  $consulta = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre AS categoria_nombre FROM productos JOIN categorias ON productos.categoria_id = categorias.id ORDER BY productos.nombre ASC";

  $resultado = mysqli_query($conexion, $consulta);

  if (!$resultado) {
      die('Error en la consulta: ' . mysqli_error($conexion));
  }

  $productos = array();
  while ($producto = mysqli_fetch_assoc($resultado)) {
      $productos[] = $producto;
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
function adminActualizarUsuario($id_usuario, $nombre, $apellido_paterno, $apellido_materno, $email, $dni, $fecha_nacimiento, $direccion, $ciudad, $hashed_password) {
  global $conexion;

  // Si la fecha de nacimiento está vacía, establece su valor en NULL
  if (empty($fecha_nacimiento)) {
      $fecha_nacimiento = 'NULL';
  } else {
      // Asegúrate de que la fecha esté entre comillas simples para que sea tratada como una cadena en la consulta SQL
      $fecha_nacimiento = "'$fecha_nacimiento'";
  }

  $query = "UPDATE usuarios SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', correo = '$email', dni = '$dni', fecha_nacimiento = $fecha_nacimiento, direccion = '$direccion', ciudad = '$ciudad', contraseña = '$hashed_password' WHERE id = $id_usuario";

  if (mysqli_query($conexion, $query)) {
      return true;
  } else {
      echo "Error al actualizar el usuario: " . mysqli_error($conexion);
      return false;
  }
}
function obtenerProductoPorId($id_producto) {
  include 'conexion.php';
  global $conexion;

  $consulta = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.id AS categoria_id, categorias.nombre AS categoria_nombre FROM productos JOIN categorias ON productos.categoria_id = categorias.id WHERE productos.id = $id_producto";

  $resultado = mysqli_query($conexion, $consulta);

  if (!$resultado) {
      die('Error en la consulta: ' . mysqli_error($conexion));
  }

  $producto = mysqli_fetch_assoc($resultado);

  return $producto;
}
function obtenerTodasCategorias() {
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
function subirImagenProducto($imagen) {
  // Ruta donde se guardarán las imágenes
  $ruta = "C:\xampp\htdocs\SEN_proyect_ventas\\";

  // Obtener el nombre y extensión del archivo
  $nombre_archivo = basename($imagen['name']);
  $extension_archivo = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

  // Generar un nombre único para el archivo
  $nombre_unico = uniqid() . "." . $extension_archivo;

  // Comprobar que el archivo se haya subido correctamente
  if (!move_uploaded_file($imagen['tmp_name'], $ruta . $nombre_unico)) {
      die("No se pudo subir la imagen.");
  }

  return $ruta . $nombre_unico;
}

// Función para eliminar la imagen de un producto
function eliminarImagenProducto($imagen_actual) {
  if (!empty($imagen_actual)) {
      unlink($imagen_actual);
  }
}

// Función para actualizar un producto
function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $categoria_id) {
  global $conexion;
  $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, categoria_id = ? WHERE id = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $categoria_id, $id_producto);
  return $stmt->execute();
}

