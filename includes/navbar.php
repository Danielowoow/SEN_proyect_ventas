<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Tienda en línea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="productos/index.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog/index.php">Blog</a>
                    </li>
                </ul>
                <form class="d-flex me-4">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">
                            <li><a class="dropdown-item" href="usuarios/login.php">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="usuarios/mi_perfil.php">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="usuarios/mis_pedidos.php">Mis pedidos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrito/index.php">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>