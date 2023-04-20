
<?php
session_start();
include "../includes/conexion.php";
include "../includes/funciones_admin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginadmin($email, $password)) {
        header("Location: admin.php");
        exit;
    } else {
        echo '<div style="text-align: center; font-family: Arial, sans-serif;">';
        echo '<p style="color: red; font-weight: bold; font-size: 18px;">Credenciales incorrectas</p>';
        echo '<a href="login_admin.php" style="display: inline-block; background-color: #007bff; border: none; color: white; text-align: center; text-decoration: none; font-size: 14px; font-weight: bold; padding: 10px 20px; margin-top: 10px; border-radius: 4px;">Intentar de nuevo</a>';
        echo '</div>';      }
}
?>