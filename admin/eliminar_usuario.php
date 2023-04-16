<?php
  // Incluir funcionesadmin.php
  require_once '../includes/funciones_admin.php';

  // Verificar si se ha enviado el formulario
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni'])) {
    // Obtener el DNI del formulario
    $dni = $_POST['dni'];

    // Llamar a la función eliminarUsuarioPorDNI
    $resultado = eliminarUsuarioPorDNI($dni);

    // Redirigir a la página de administrador con un mensaje de éxito o error
    if ($resultado) {
      header('Location: admin.php?mensaje=Usuario eliminado correctamente');
    } else {
      header('Location: admin.php?e rror=No se pudo eliminar el usuario');
    }
  } else {
    // Si no se envió el formulario, redirigir a la página de administrador
    header('Location: admin.php');
  }
?>


