<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qosqo market</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css"> -->
    <script src="js/bootstrap.js"></script>
    

</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>


    <main>
        <!-- Aquí va el contenido principal de la página -->
        <section class="content-cintillo content-placeholder-cintillo-cat-1 gh-gtm " data-position="">
            <div class="cintillo-normal"><a href="https://youtu.be/dQw4w9WgXcQ" class="link-cintillo gh-gtm-img" data-name="CyberWow_agora" data-position="Home_H-Cintillo-01" data-index="" data-creative="https://promart.vteximg.com.br/arquivos/Cintillo-desktop-1366x46.png" target="_blank"></a>
                <img class="" src="https://promart.vteximg.com.br/arquivos/Cintillo-desktop-1366x46.png">
            </div>
        </section>

<!-- Banner principal -->
<!--
<section class="banner">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagenes/sen.png" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="imagenes/sen2.png" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="imagenes/sen3.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section> -->
<section class="section-container" id="section-to-close">
        <h2>Contenido de la sección</h2>
        <p>Esta sección se cerrará al hacer clic en el botón X en la parte superior derecha.</p>
        <button class="close-btn" onclick="closeSection()">x</button>
    </section>

        <!-- Categorías de productos -->
        <section class="categorias my-5">
    <div class="container">
        <h2 class="text-center mb-4">Categorías de productos</h2>
        <div class="row">
            <!-- Repite el siguiente bloque por cada categoría -->
            <div class="col-md-4">
                <div class="card">
                    <img src="imagen_categoria.jpg" class="card-img-top" alt="Nombre de la categoría">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre de la categoría</h5>
                        <p class="card-text">Descripción breve de la categoría.</p>
                        <a href="#" class="btn btn-primary">Ver productos</a>
                    </div>
                </div>
            </div>
            <!-- Fin del bloque -->
        </div>
    </div>
</section>

<section class="productos-destacados my-5">
    <div class="container">
        <h2 class="text-center mb-4">Productos destacados</h2>
        <div class="row">
            <!-- Repite el siguiente bloque por cada producto destacado -->
            <div class="col-md-4">
                <div class="card">
                    <img src="imagen_producto.jpg" class="card-img-top" alt="Nombre del producto">
                    <div class="card-body">
                        <h5 class="card-title">Nombre del producto</h5>
                        <p class="card-text">Descripción breve del producto.</p>
                        <div class="d-flex justify-content-between">
                            <span class="price">$ Precio</span>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin del bloque -->
        </div>
    </div>
</section>  
    </main>
jijija

    <?php include 'includes/footer.php'; ?>
    <a href="https://wa.me/51931998025  " target="_blank" class="whatsapp-link">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Ícono de WhatsApp" class="whatsapp-icon">
</a>
<style>
    .whatsapp-link {
  display: inline-block;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
}

.whatsapp-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
}
.section-container {
            position: relative;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 12px;
            background-color: #f1f1f1;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 4px;
        }

        .close-btn:hover {
            background-color: #ddd;
        }
</style>
<script>
        function closeSection() {
            document.getElementById("section-to-close").style.display = "none";
        }
    </script>
</body>
</html>