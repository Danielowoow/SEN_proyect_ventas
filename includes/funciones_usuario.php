
<?php
// Aquí puedes incluir funciones relacionadas con los usuarios.
// Por ejemplo:

function loginUsuario($email, $password) {
    global $conexion;

    $query = "SELECT * FROM usuarios WHERE correo = '$email' AND contraseña = '$password'";

    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['id_usuario'] = $usuario['id'];
        return true;
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
