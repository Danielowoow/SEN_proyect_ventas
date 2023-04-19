<?php 
include "../includes/conexion.php";
include "../includes/funciones_admin.php";  

    $productos = obtenerTodosProductos(); 
    ?>
    <?php if (count($productos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['precio']) ?></td>
                        <td><?= htmlspecialchars($producto['categoria_nombre']) ?></td>
                        <td>
                            <?php if (!empty($producto['imagen'])): ?>
                                <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" style="max-width: 100px; max-height: 100px;">
                            <?php else: ?>
                                <p>No hay imagen disponible</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron productos.</p>
    <?php endif; ?>
