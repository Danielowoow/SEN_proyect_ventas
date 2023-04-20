<?php
session_start();

// Comprueba si un administrador ha iniciado sesión
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login_admin.php");
    exit;
}

// El resto de tu código para admin.php

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="estilos.css">
  <script src="funciones.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
      <li><a href="#buscar-producto">buscar producto</a></li>
      <li><a href="#ver-productos">ver/borrar/Editar producto</a></li>
      <li><a href="#buscar-usuario">Buscar usuarios</a></li>
      <li><a href="#ver-usuarios">Editar/ver/eliminar usuario</a></li>
      <li><a href="#ver-usuarios">Ver usuarios</a></li>
      <!-- Otras opciones -->
      <li><a href="#historial-pedidos">Historial de pedidos</a></li>
      <li><a href="#informes">Informes</a></li>
    </ul>
  </nav>

  <main>
    <!-- Aquí es donde agregarás los formularios y tablas para cada función -->
<section id="agregar-producto">
  <h2>Agregar producto</h2>
  <form action="agregar_producto.php" method="post" enctype="multipart/form-data">

    <label for="nombre">Nombre del producto:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea>

    <label for="precio">Precio:</label>
<input type="text" id="precio" name="precio" required pattern="^\d{1,8}(\.\d{2})?$" title="Por favor, ingrese un precio válido con hasta 8 dígitos enteros y 2 dígitos decimales">

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen">

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria_id">

  <option value="1">Celulares y Tablets</option>
  <option value="2">Computadoras y Laptops</option>
  <option value="3">Audio y Video</option>
  <option value="4">Accesorios</option>
  <option value="5">Cámaras y Fotografía</option>
  <option value="6">Gaming</option>
  <option value="7">Redes y Conectividad</option>
  <option value="8">Impresoras y Escáneres</option>
  <option value="9">Almacenamiento</option>
  <option value="10">Proyectores y Pantallas</option>
</select>

<button type="submit" name="agregar_producto">Agregar producto</button>

  </form>
  
</section>
<section id="buscar-producto">
    <h2>Buscar producto</h2>
    <form action="buscar_producto.php" method="post" id="buscarProductoForm">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="precioMin">Precio mínimo:</label>
        <input type="number" id="precioMin" name="precioMin" step="0.01" min="0">

        <label for="precioMax">Precio máximo:</label>
        <input type="number" id="precioMax" name="precioMax" step="0.01" min="0">

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
            <option value="">--Seleccionar--</option>
            <!-- Aquí puedes añadir tus categorías -->
            <option value="1">Celulares y Tablets</option>
            <option value="2">Computadoras y Laptops</option>
            <option value="3">Audio y Video</option>
            <option value="4">Accesorios</option>
  <option value="5">Cámaras y Fotografía</option>
  <option value="6">Gaming</option>
  <option value="7">Redes y Conectividad</option>
  <option value="8">Impresoras y Escáneres</option>
  <option value="9">Almacenamiento</option>
  <option value="10">Proyectores y Pantallas</option>

            <!-- ... -->
        </select>

        <button type="submit" id="buscarBtn">Buscar</button>
    </form>
    <div id="resultados">
        <!-- Aquí se mostrarán los resultados -->
    </div>
    <script>
        // Función para manejar la búsqueda y mostrar los resultados
        function buscarProductos() {
            // Recopila los datos del formulario
            var formData = {
                'nombre': $('#nombre').val(),
                'precioMin': $('#precioMin').val(),
                'precioMax': $('#precioMax').val(),
                'categoria': $('#categoria').val()
            };

            // Realiza una solicitud AJAX a buscar_producto.php
            $.ajax({
                type: 'POST',
                url: 'buscar_producto.php',
                data: formData,
                dataType: 'html',
                encode: true
            })
            .done(function(data) {
                // Muestra los resultados en el div con id "resultados"
                $('#resultados').html(data);
            });
        }

        // Escucha el evento "submit" del formulario
        $('#buscarProductoForm').submit(function(event) {
            // Evita que se recargue la página
            event.preventDefault();
            // Llama a la función buscarProductos()
            buscarProductos();
        });
    </script>

</section>
<section id="ver-productos">
    <h2>Todos los productos</h2>
    <button id="cargarProductosBtn">Cargar productos</button>
    <div id="productT">
        <!-- Aquí se mostrarán los productos -->
    </div>
    <script>
        function cargarProductos() {
            $.ajax({
                type: 'GET',
                url: 'productosT.php',
                dataType: 'html',
                encode: true
            })
            .done(function(data) {
                $('#productT').html(data);
            });
        }

        $('#cargarProductosBtn').click(function(event) {
            event.preventDefault();
            cargarProductos();
        });

        // Escucha el evento de clic en los botones "Eliminar"
        $(document).on('click', '.eliminarProductoBtn', function(event) {
            event.preventDefault();
            var productoId = $(this).data('producto-id');
            var confirmacion = confirm('¿Está seguro de que desea eliminar este producto?');
            if (confirmacion) {
                $.ajax({
                    type: 'POST',
                    url: 'eliminar_producto.php',
                    data: {
                        'producto_id': productoId
                    },
                    dataType: 'json'
                })
                .done(function(data) {
                    if (data.success) {
                        cargarProductos();
                    } else {
                        alert('Error al eliminar el producto.');
                    }
                });
            }
        });

        // Escucha el evento de clic en los botones "Editar"
        $(document).on('click', '.editarProductoBtn', function(event) {
            event.preventDefault();
            var productoId = $(this).data('producto-id');
            // Agregar código aquí para redirigir a la página de edición del producto
            // por ejemplo:
            window.location.href = 'editar_producto.php?id=' + productoId;
        });
    </script>
</section>  

<section id="editar-producto">
      <!-- Formulario para editar producto -->
</section>
    <section id="buscar-usuario">
  <h2>Buscar usuario</h2>
  <form action="" method="post">
    <label for="busqueda">Ingresa el correo electrónico o el DNI del usuario:</label>
    <input type="text" id="busqueda" name="busqueda" required>
    <button type="submit">Buscar</button>
  </form>
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
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $busqueda = $_POST['busqueda'];
      $usuarios = buscarUsuario($busqueda);

      if ($usuarios) {
        // Recorrer la lista de usuarios y mostrarlos en la tabla
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
          echo "<td>";
          echo "<form action='editar_usuario.php' method='post'>";
          echo "<input type='hidden' name='id' value='{$usuario['id']}'>";
          echo "<button type='submit' onclick='return confirm(\"¿Está seguro de eliminar este usuario?\");'><i class='bi bi-pencil'></i></button>";
          echo "</form>";
          echo "<form action='eliminar_usuario.php' method='post'>";
          echo "<input type='hidden' name='id' value='{$usuario['id']}'>";
          echo "<button type='submit' onclick='return confirm(\"¿Está seguro de eliminar este usuario?\");'><i class='bi bi-trash'></i></button>";
          echo "</form>";

          echo "</td>";
          echo "</tr>";
        }
      } else {
        // Mostrar un mensaje si no se encontraron usuarios
        echo "<tr><td colspan='10'>No hay usuarios registrados.</td></tr>";
      }
    }
  ?>
      </tbody>
  </table>
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
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Obtener la lista de usuarios
        $usuarios = obtenerUsuarios();
        
        // Verificar si se encontraron usuarios
        if ($usuarios) {
          // Recorrer la lista de usuarios y mostrarlos en la tabla
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
            echo "<td>";
            echo "<form action='editar_usuario.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$usuario['id']}'>";
            echo "<button type='submit' onclick='return confirm(\"¿Está seguro editar este usuario?\");'><i class='bi bi-pencil'></i></button>";
            echo "</form>";
            echo "<form action='eliminar_usuario.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$usuario['id']}'>";
            echo "<button type='submit' onclick='return confirm(\"¿Está seguro de eliminar este usuario?\");'><i class='bi bi-trash'></i></button>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
          }
        } else {
          // Mostrar un mensaje si no se encontraron usuarios
          echo "<tr><td colspan='10'>No hay usuarios registrados.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</section>
</section>         

    <!-- editar usuario-->
    
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
<style>
  
  /* Estilos básicos */
body {
  background-color: #f1f1f1;
  color: #333;
  font-family: Arial, sans-serif;
}

/* Ajustes de la sección */
section {
  border: 1px solid #ddd;
  margin: 20px 0;
  padding: 20px;
}

/* Estilos del formulario */
form {
  display: flex;
  flex-direction: column;
  max-width: 500px;
}

label {
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
}

select {
  margin-bottom: 20px;
  padding: 10px;
  font-size: 16px;
}

button[type="submit"] {
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 16px;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}

/* Estilos de la tabla */
table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  background-color: #007bff;
  color: #fff;
  font-weight: bold;
}

/* Estilos del enlace */
a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
nav ul {
  display: flex; /* establece la dirección flexible */
  justify-content: flex-start; /* alinea los elementos en la parte izquierda */
  list-style: none; /* elimina los estilos de la lista */
  margin: 0; /* elimina el margen predeterminado de la lista */
  padding: 0; /* elimina el relleno predeterminado de la lista */
}

nav li {
  margin-right: 20px; /* agrega un espacio entre los elementos */
}

nav a {
  display: inline-block; /* convierte los enlaces en elementos en línea con ancho */
  padding: 10px 15px; /* agrega relleno a los botones */
  border: 1px solid #000; /* agrega un borde sólido de 1px */
  border-radius: 5px; /* agrega esquinas redondeadas a los botones */
  background-color: #FFF; /* establece el color de fondo */
  color: #000; /* establece el color de texto */
  font-weight: bold; /* establece el peso de fuente en negrita */
  text-decoration: none; /* elimina el subrayado predeterminado */
  transition: background-color 0.3s ease; /* agrega una transición suave en el cambio de color de fondo */
}

nav a:hover,
nav a:focus,
nav a:active {
  background-color: #000; /* cambia el color de fondo cuando se coloca el cursor o se hace clic */
  color: #FFF; /* cambia el color de texto cuando se coloca el cursor o se hace clic */
}

</style>
</body>
</html>