<?php 
session_start();
require_once '../includes/funciones_admin.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de administrador</title>
  <!-- Añadir enlaces a tus archivos CSS y JavaScript aquí, si los tienes -->
  <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> 

  <link rel="stylesheet" href="estilos.css">
  <script src="funciones.js"></script>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>
  <header>
    <h1>Panel de administrador</h1>
  </header>

  <nav>
    <ul>
      <li><a href="#agregar-producto">Agregar producto</a></li>
      <li><a href="#editar-producto">Editar producto</a></li>
      <li><a href="#editar-usuario">Editar usuario</a></li>
      <li><a href="#eliminar-usuario">Eliminar usuario</a></li>
      <li><a href="#eliminar-producto">Eliminar producto</a></li>
      <li><a href="#ver-usuarios">Ver usuarios</a></li>
      <!-- Otras opciones -->
      <li><a href="#historial-pedidos">Historial de pedidos</a></li>
      <li><a href="#informes">Informes</a></li>
    </ul>
  </nav>

  <main>
    <!-- Aquí es donde agregarás los formularios y tablas para cada función -->
    <section id="agregar-producto">
      <!-- Formulario para agregar producto -->
    </section>

    <section id="editar-producto">
      <!-- Formulario para editar producto -->
    </section>

    <section id="editar-usuario">
      <!-- Formulario para editar usuario -->
    </section>
    <section id="eliminar-usuario">
  <h2>Eliminar usuario</h2>
  <form method="post" action="eliminar_usuario.php">
    <label for="dni">DNI del usuario a eliminar:</label>
    <input type="text" id="dni" name="dni" required>
    <button type="submit">Eliminar usuario</button>
  </form>
</section>

    <section id="eliminar-producto">
      <!-- Formulario para eliminar producto -->
    </section>

    <section id="ver-usuarios">
  <h2>Usuarios</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Correo</th>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Fecha de nacimiento</th>
        <th>Dirección</th>
        <th>Ciudad</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Llamar a la función obtenerUsuarios()
        $usuarios = obtenerUsuarios();

        if ($usuarios) {
          // Si hay usuarios, recorrer el array y mostrarlos en la tabla
          foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>{$usuario['id']}</td>";
            echo "<td>{$usuario['correo']}</td>";
            echo "<td>{$usuario['dni']}</td>";
            echo "<td>{$usuario['nombre']}</td>";
            echo "<td>{$usuario['apellido_paterno']}</td>";
            echo "<td>{$usuario['apellido_materno']}</td>";
            echo "<td>{$usuario['fecha_nacimiento']}</td>";
            echo "<td>{$usuario['direccion']}</td>";
            echo "<td>{$usuario['ciudad']}</td>";
            echo "</tr>";
          }
        } else {
          // Si no hay usuarios, mostrar un mensaje
          echo "<tr><td colspan='9'>No hay usuarios registrados.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</section>

    <!-- Otras secciones adicionales -->
    <section id="historial-pedidos">
      <!-- Tabla para mostrar historial de pedidos -->
    </section>

    <section id="informes">
      <!-- Sección para generar y mostrar informes -->
    </section>
  </main>

  <footer>
<!-- Copyright -->
<div class="row mt-3">
<div class="col-md-12 text-center">
<p>© 2023 - Qosqo Market admin   . Todos los derechos reservados.</p>
</div>
</div>
</div>  </footer>
</body>
</html>
