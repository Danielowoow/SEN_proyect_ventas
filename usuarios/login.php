
<?php
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUsuario($email, $password)) {
        echo "entro exitosamente";
        echo "dale click";
        echo '<li><a class="dropdown-item" href="http://localhost/SEN_proyect_ventas/">Iniciar sesión</a></li>';
    } else {
        echo "Credenciales incorrectas";
        echo '<li><a class="dropdown-item" href="http://localhost/SEN_proyect_ventas/login.php">Intenar de nuevo</a></li>';
    }
}
?>

