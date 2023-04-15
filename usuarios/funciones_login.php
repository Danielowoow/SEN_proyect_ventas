<?php
function loginUsuario($email, $password) {
    global $conexion;

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['id_usuario'] = $usuario['id'];
        return true;
    } else {
        return false;
    }
}
?>

