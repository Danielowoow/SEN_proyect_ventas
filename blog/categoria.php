<?php
include "../includes/conexion.php";
include "../includes/funciones_blog.php";
$categoria = $_GET['categoria'];
$posts = obtenerPostsPorCategoria($categoria);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría - <?php echo $categoria; ?></title>
</head>
<body>
    <div>
        <?php foreach ($posts as $post): ?>
        <div>
            <h3><?php echo $post['titulo']; ?></h3>
            <p><?php echo $post['resumen']; ?></p>
            <a href="post.php?id=<?php echo $post['id']; ?>">Leer más</a>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

