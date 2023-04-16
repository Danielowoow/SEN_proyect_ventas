<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>  

    <div class="register-form-container">
      <div class="register-form-wrapper">
        <form action="usuarios/registro.php" method="post">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Contraseña" pattern=".{8,}" title="La contraseña debe contener al menos 8 caracteres" required>
          <input type="password" name="confirm_password" placeholder="Confirmar contraseña" pattern=".{8,}" title="Las contraseñas deben coincidir" required>
          <div>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">Acepto los <a href="https://es.wix.com/about/terms-of-use" target="_blank">términos y condiciones</a></label>
          </div>
          <button type="submit">Registrarse</button>
        </form>
        <div class="register-form-links">
          <a href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
        </div>
      </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
<style>
    /* Estilos generales */
body {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}

/* Estilos del contenedor del formulario de registro */
.register-form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 20px;
}

/* Estilos del contenedor del formulario */
.register-form-wrapper {
  background-color: #fff;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  width: 100%;
}

/* Estilos del formulario */
form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

input[type="email"],
input[type="password"] {
  padding: 10px;
  border: none;
  border-bottom: 2px solid #ddd;
  font-size: 18px;
  font-weight: bold;
  color: #333;
  background-color: transparent;
  transition: border-color 0.3s, background-color 0.3s;
}

input[type="email"]:focus,
input[type="password"]:focus {
  outline: none;
  border-bottom-color: #2196f3;
  background-color: #f5f5f5;
}

input[type="password"]:invalid {
  border-bottom-color: #f44336;
}

input[type="password"]:invalid:focus {
  background-color: #f5f5f5;
}

input[type="email"]::placeholder,
input[type="password"]::placeholder {
  color: #bbb;
}

input[type="checkbox"] {
  margin-right: 10px;
}

label[for="terms"] {
  font-size: 14px;
  color: #666;
}

button[type="submit"] {
  padding: 15px;
  background-color: #2196f3;
  color: #fff;
  font-size: 18px;
  font-weight: bold;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button[type="submit"]:hover {
  background-color: #0e8bf1;
}

/* Estilos de los enlaces */
a {
  text-decoration: none;
  color: #2196f3;
  font-size: 14px;
  transition: color 0.3s;
}

a:hover {
  color: #0e8bf1;
}

/* Estilos de los contenedores de enlaces */
.register-form-links {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}

.register-form-links a {
  font-size: 14px;
  color: #666;
}

.register-form-links a:hover {
  color: #2196f3;
}

/* Estilos de los mensajes de error */
.error-message {
  color: #f44336;
  font-size: 14px;
  margin-top: 5px;
}

/* Estilos del campo de entrada con errores */
.input-error {
  border-bottom-color: #f44336 !important;
}

/* Estilos del mensaje de éxito */
.success-message {
  color: #4CAF50;
  font-size: 18px;
margin-top: 20px;
text-align: center;
}

/* Estilos del mensaje de éxito después de 3 segundos */
.success-message.fade-out {
opacity: 0;
transition: opacity 0.3s;
}



</style>
</html>