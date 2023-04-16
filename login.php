<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">

    <title>Qosqo Market</title>


</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>    
    <div class="login-form-container">
        <form action="usuarios/login.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Iniciar sesión</button>
        </form>
        <div>
            <a href="usuarios/recuperar_contraseña.php">Olvidaste tu contraseña</a>
        </div>
        <div>
            <a href="usuarios/google_login.php">Ingresa con Google</a>
        </div>
        <div>
            <a href="registro.php">Regístrate</a>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>