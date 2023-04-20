<?php
session_start();

// Obtener ID del producto y acción del formulario
$producto_id = isset($_POST['producto_id']) ? intval($_POST['producto_id']) : 0;
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

// Verificar que el ID del producto es válido
if ($producto_id <= 0) {
    die("ID de producto inválido");
}

// Agregar el producto al carrito
if ($accion === 'comprar') {
    // Redirigir al usuario a la página de pago
    header("Location: pagar.php?producto_id=$producto_id");
    exit();
} elseif ($accion === 'agregar_al_carrito') {
    // Obtener o crear el carrito de compras
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 1;
    } else {
        $_SESSION['carrito'][$producto_id]++;
    }

    // Redirigir al usuario al catálogo
    header("Location: ../index.php");
    exit();
} else {
    die("Acción inválida");
}