<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Aquí puedes guardar el correo electrónico en la base de datos, si es necesario
        // ...
        
        // Enviar correo electrónico de bienvenida
        send_welcome_email($email);
    } else {
        echo "Correo electrónico no válido";
    }
}

function send_welcome_email($email) {
    $subject = "Bienvenido a nuestras promociones";
    $message = "Gracias por suscribirte a nuestras promociones. Recibirás las mejores ofertas en tu correo electrónico.";
    $headers = "From: noreply@example.com" . "\r\n" .
               "Reply-To: noreply@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($email, $subject, $message, $headers)) {
        echo "Correo electrónico de bienvenida enviado a " . $email;
    } else {
        echo "Error al enviar el correo electrónico";
    }
}

?>
    