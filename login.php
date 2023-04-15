<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">

    <title>Qosqo Market</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>
<body>
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
</body>
</html>