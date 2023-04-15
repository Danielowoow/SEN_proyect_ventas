<?php
function obtenerComentariosPorPostId($post_id) {
    global $conexion;
    $query = "SELECT * FROM comentarios WHERE post_id = '$post_id'";
    $resultado = mysqli_query($conexion, $query);
    $comentarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $comentarios;
}
?>

