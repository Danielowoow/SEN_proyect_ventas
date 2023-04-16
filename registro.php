
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>  
<form action="usuarios/registro.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Contraseña" pattern=".{8,}" title="pendejo, minimo 8 caracteres y no ponghas 1-8" required>

        <input type="password" name="confirm_password" placeholder="confirmar Contraseña" pattern=".{8,}" title="repite lo mismo que escribiste, no seas gil" required>
        <div>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">Acepto los <a href="https://es.wix.com/about/terms-of-use" target="_blank">términos y condiciones</a></label>
        </div>
        <button type="submit">Registrarse</button>
    </form>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
