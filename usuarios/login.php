
<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_usuario.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUsuario($email, $password)) {
        echo "entro exitosamente";
        echo "dale click";
        echo '<li><a class="dropdown-item" tipe= "button" href="http://localhost/SEN_proyect_ventas/usuarios/perfil.php">pagina de inicio</a></li>';
    } else {
        echo "Credenciales incorrectas";
        echo '<li><a class="button" href="http://localhost/SEN_proyect_ventas/login.php">Intenar de nuevo</a></li>';
    }
}
?>

