<?php
$host = 'localhost';
$usuario = 'nombre_usuario';
$contrasena = 'contraseña';
$base_datos = 'nombre_base_datos';

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

