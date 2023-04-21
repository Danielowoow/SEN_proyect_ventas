<?php
include '../includes/conexion.php';
// Crea una conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtiene los datos del formulario
$nombreTabla = $_POST["nombre_tabla"];
$columnas = $_POST["columnas"];
$tipos = $_POST["tipos"];
$longitudes = $_POST["longitudes"];
$primary = $_POST["primary"];
$notnull = $_POST["notnull"];
$foreignKeys = $_POST["foreign_key_reference_column"];
$comentarios = $_POST["comentarios"];

// Crea la tabla en la base de datos
$sql = "CREATE TABLE $nombreTabla (";
for ($i = 0; $i < count($columnas); $i++) {
    $columna = $columnas[$i];
    $tipo = $tipos[$i];
    $longitud = $longitudes[$i];
    if ($longitud) {
        $tipo .= "($longitud)";
    }
    $constraint = "";
    if (isset($primary[$i])) {
        $constraint .= " PRIMARY KEY";
    }
    if (isset($notnull[$i])) {
        $constraint .= " NOT NULL";
    }
    $sql .= "$columna $tipo$constraint, ";
}
if (count($foreignKeys) > 0) {
    $sql .= " FOREIGN KEY (";
    for ($i = 0; $i < count($foreignKeys); $i++) {
        if ($i > 0) {
            $sql .= ", ";
        }
        $sql .= $foreignKeys[$i];
    }
    $sql .= ") REFERENCES ";
    $sql .= $_POST["foreign_key_table"][0];
    $sql .= " (";
    $sql .= $_POST["foreign_key_column"][0];
    $sql .= ")";
}
$sql .= ")";
if ($comentarios) {
    $sql .= " COMMENT='$comentarios'";
}
if ($conn->query($sql) === TRUE) {
    echo "Tabla creada exitosamente";
} else {
    echo "Error al crear la tabla: " . $conexion->error;
}

$conexion->close();
?>
