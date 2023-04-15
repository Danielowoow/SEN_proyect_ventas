<?php
function obtenerPosts() {
    global $conexion;
    $query = "SELECT * FROM posts";
    $resultado = mysqli_query($conexion, $query);
    $posts = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $posts;
}

function obtenerPostPorId($post_id) {
    global $conexion;
    $query = "SELECT * FROM posts WHERE id = '$post_id'";
    $resultado = mysqli_query($conexion, $query);
    $post = mysqli_fetch_assoc($resultado);
    return $post;
}

function obtenerPostsPorCategoria($categoria) {
    global $conexion;
    $query = "SELECT * FROM posts WHERE categoria = '$categoria'";
    $resultado = mysqli_query($conexion, $query);
    $posts = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $posts;
}

function buscarPosts($busqueda) {
    global $conexion;
    $query = "SELECT * FROM posts WHERE titulo LIKE '%$busqueda%' OR contenido LIKE '%$busqueda%'";
    $resultado = mysqli_query($conexion, $query);
    $posts = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $posts;
}
?>

