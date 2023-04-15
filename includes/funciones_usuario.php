
<?php
// Aquí puedes incluir funciones relacionadas con los usuarios.
// Por ejemplo:



function actualizarUsuario($id_usuario, $nombre, $apellido_paterno, $apellido_materno, $email, $dni, $fecha_nacimiento, $direccion, $ciudad, $hashed_password) {
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

function loginUsuario($email, $password) {
    global $conexion;

    $query = "SELECT * FROM usuarios WHERE correo = '$email'";

    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $hashed_password = $usuario['contraseña'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['id_usuario'] = $usuario['id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
    

function agregarUsuario($email, $password) {
    global $conexion;

    // Generar un hash de la contraseña para almacenarla de forma segura
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar el nuevo usuario
    $query = "INSERT INTO usuarios (correo, contraseña) VALUES ('$email', '$hashed_password')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}

// ... otras funciones de usuario
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
