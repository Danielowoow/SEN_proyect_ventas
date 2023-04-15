
<?php
// Aquí puedes incluir funciones relacionadas con las operaciones de administrador.
// Por ejemplo:

function verificar_permisos($usuario_id) {
    global $conexion;
    $consulta = "SELECT es_admin FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
    return $usuario['verificar_permisos'] == 1;
}
function obtenerUsuarios() {
    global $conexion;
    $usuarios = array();
    $consulta = "SELECT * FROM usuarios";
    $resultado = $conexion->query($consulta);
    while ($usuario = $resultado->fetch_assoc()) {
        $usuarios[] = $usuario;
    }
    return $usuarios;
}
