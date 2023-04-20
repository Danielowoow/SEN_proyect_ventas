<?php
// Incluir archivo de conexión
include '../includes/conexion.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago exitoso</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <main>
        <section class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1>Pago exitoso</h1>
                    <br><br>
                    <p>¡Gracias por su compra!</p>
                    <br>
                    <p>El pago se ha procesado correctamente y pronto su orden estará en camino</p>
                    <br>
                    <p>Puede ver los detalles de su compra en su perfil.</p>
                    <a href="../index.php">REGRESAR AL INICIO</a>


                </div>
            </div>
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
    <style>
/* Estilos para el mensaje "Pago exitoso" */
h1 {
  text-transform: uppercase;
  font-size: 4rem;
  margin-bottom: 2rem;
}

p {
  font-size: 1.2rem;
  line-height: 1.5;
}

/* Estilos para la sección "container" */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
  background-color: #f5f5f5;
  border-radius: 10px;
}

/* Estilos para el encabezado */
header {
  background-color: #333;
  color: #fff;
  padding: 1rem;
  text-align: center;
}

/* Estilos para la barra de navegación */
nav {
  background-color: #eee;
  padding: 1rem;
}

nav a {
  color: #333;
  text-decoration: none;
  padding: 0.5rem;
}

nav a:hover {
  background-color: #333;
  color: #fff;
}

/* Estilos para el pie de página */
footer {
  background-color: #333;
  color: #fff;
  padding: 1rem;
  text-align: center;
}
/* Estilos para el enlace "REGRESAR AL INICIO" */
a {
  display: block; /* Hacer que el enlace ocupe todo el ancho disponible */
  max-width: 200px; /* Ancho máximo del enlace */
  margin: 2rem auto; /* Margen superior e inferior automático y centrado horizontalmente */
  padding: 1rem; /* Relleno interno */
  text-align: center; /* Centrar el texto */
  font-size: 1.2rem; /* Tamaño de fuente */
  background-color: #333; /* Color de fondo */
  color: #fff; /* Color de texto */
  text-decoration: none; /* Quitar subrayado */
  border-radius: 5px; /* Bordes redondeados */
}

a:hover {
  background-color: #666; /* Cambiar el color de fondo al pasar el mouse */
}
    </style>
</body>
</html>