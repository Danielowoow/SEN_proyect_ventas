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
        <div class="login-form-wrapper"> <!-- Agrega la clase login-form-wrapper -->
            <form action="usuarios/login.php" method="post">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Contraseña">
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="login-form-links"> <!-- Agrega la clase login-form-links -->
                <a href="usuarios/recuperar_contraseña.php">Olvidaste tu contraseña</a>
                <a href="usuarios/google_login.php">Ingresa con Google</a>
                <a href="registro.php">Regístrate</a>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
</body>
<style>
    /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Centrar el contenedor del formulario de inicio de sesión */
.login-form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

/* Estilos del contenedor del formulario */
.login-form-wrapper {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Estilos del formulario */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input[type="email"],
input[type="password"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

button[type="submit"] {
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Estilos de los enlaces */
a {
    text-decoration: none;
    color: #333;
}

a:hover {
    text-decoration: underline;
}

/* Estilos de los contenedores de enlaces */
.login-form-links {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 15px;
}
</style>
</html>