
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
<form action="usuarios/registro.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
        <div>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">Acepto los <a href="terminos_y_condiciones.php" target="_blank">términos y condiciones</a></label>
        </div>
        <button type="submit">Registrarse</button>
    </form>

</body>
</html>
