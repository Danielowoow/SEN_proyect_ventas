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
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}

/* Estilos del contenedor del formulario de inicio de sesión */
.login-form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 20px;
}

/* Estilos del contenedor del formulario */
.login-form-wrapper {
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
  padding: 15px;
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

input[type="email"]::placeholder,
input[type="password"]::placeholder {
  color: #bbb;
}

button[type="submit"] {
  padding: 15px;
  background-color: #2196f3;
  color: #fff;
  font-size: 24px;
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
  font-size: 18px;
  transition: color 0.3s;
}

a:hover {
  color: #0e8bf1;
}

/* Estilos de los contenedores de enlaces */
.login-form-links {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}

.login-form-links a {
  font-size: 14px;
  color: #666;
}

.login-form-links a:hover {
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
  font-size: 14px;
  margin-top: 5px;
}

/* Estilos del mensaje de carga */
.loading-message {
  color: #333;
  font-size: 14px;
margin-top: 5px;
}

/* Estilos del botón de carga */
.loading-button {
position: relative;
}

.loading-button:before {
content: '';
display: block;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
width: 20px;
height: 20px;
border: 2px solid #fff;
border-top-color: transparent;
border-radius: 50%;
}

.loading-button.loading:before {
animation: spin 1s linear infinite;
}

@keyframes spin {
to {
transform: translate(-50%, -50%) rotate(360deg);
}
}



</style>
<script>
    const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const form = document.querySelector('form');
const submitButton = document.querySelector('button[type="submit"]');

form.addEventListener('submit', (event) => {
let errors = [];

if (emailInput.value.trim() === '') {
errors.push('Debes ingresar tu correo electrónico.');
emailInput.classList.add('input-error');
}

if (passwordInput.value.trim() === '') {
errors.push('Debes ingresar tu contraseña.');
passwordInput.classList.add('input-error');
}

if (errors.length > 0) {
event.preventDefault();
const errorMessage = document.createElement('p');
errorMessage.classList.add('error-message');
errorMessage.innerText = errors.join(' ');
form.appendChild(errorMessage);
} else {
event.preventDefault();
submitButton.classList.add('loading-button');
submitButton.disabled = true;
const successMessage = document.createElement('p');
successMessage.classList.add('success-message');
successMessage.innerText = 'Iniciando sesión...';
form.appendChild(successMessage);
// Simular una solicitud de inicio de sesión al servidor aquí
setTimeout(() => {
form.submit();
}, 3000);
}
});

emailInput.addEventListener('input', () => {
emailInput.classList.remove('input-error');
});

passwordInput.addEventListener('input', () => {
passwordInput.classList.remove('input-error');
});
</script>
</html>