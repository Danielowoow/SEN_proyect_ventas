
<?php
function registrarUsuario($nombre, $email, $password) {
    global $conexion;

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";

    if (mysqli_query($conexion, $query)) {
        return true;
    } else {
        return false;
    }
}
?>
