
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/SEN_proyect_ventas">Tienda en línea</a>
        <label for="navbar-toggle" class="navbar-toggler-icon" id="navbar-toggle-label"></label>
        <input type="checkbox" id="navbar-toggle" class="d-none">
        <div class="navbar-collapse">
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
                    <label class="nav-link" for="navbarDropdown">
                        <i class="bi bi-person"></i>
                    </label>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://localhost/SEN_proyect_ventas/login.php">Iniciar sesión</a></li>
                        <li><a class="dropdown-item" href="http://localhost/SEN_proyect_ventas/usuarios/perfil.php">Mi perfil</a></li>
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
<style>
    .nav-item.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
</style>
</body>