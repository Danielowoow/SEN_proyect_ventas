
<?php
// Aquí puedes incluir funciones genéricas que se utilizarán en todo el proyecto.
// Por ejemplo:

function limpiar_cadena($cadena) {
    return htmlspecialchars(strip_tags(trim($cadena)));
}

function redirect($url) {
    header("Location: " . $url);
    exit();
}

