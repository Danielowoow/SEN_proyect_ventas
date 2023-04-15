
<?php
include "../includes/conexion.php";
include "../includes/funciones_blog.php";
$post_id = $_GET['id'];
$post = obtenerPostPorId($post_id);
$comentarios = obtenerComentariosPorPostId($post_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['titulo']; ?></title>
</head>
<body>
    <div>
        <h1><?php echo $post['titulo']; ?></h1>
        <p><?php echo $post['contenido']; ?></p>
    </div>
    <div>
        <h2>Comentarios</h2>
        <?php foreach ($comentarios as $comentario): ?>
        <div>
            <p><?php echo $comentario['autor']; ?>: <?php echo $comentario['comentario']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
