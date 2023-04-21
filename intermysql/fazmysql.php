<!DOCTYPE html>
<html>
<head>
	<title>Crear tabla</title>
	<script src="crear_tabla.js"></script>
</head>
<body>
	<h2>Crear una nueva tabla</h2>
	<form method="post" action="crear_tabla.php">
		<label for="nombre_tabla">Nombre de la tabla:</label>
		<input type="text" name="nombre_tabla" id="nombre_tabla"><br>
		<div id="columnas">
			<div>
				<label>Nombre de la columna:</label>
				<input type="text" name="columnas[]" required>
				<label>Tipo de dato:</label>
				<select name="tipos[]" required>
					<option value="int">Entero</option>
					<option value="varchar">Cadena de texto</option>
					<option value="date">Fecha</option>
				</select>
				<label>Longitud:</label>
				<input type="number" name="longitudes[]">
				<label>Clave primaria:</label>
				<input type="checkbox" name="primary[]">
				<label>No nulo:</label>
				<input type="checkbox" name="notnull[]">
				<button type="button" onclick="agregarColumna()">Agregar columna</button>
				<button type="button" onclick="eliminarColumna(this)">Eliminar columna</button>
			</div>
		</div>
		<div>
			<label>Clave foránea:</label>
			<select name="foreign_key_column[]" id="foreign_key_column" onchange="actualizarCamposForeignKey(this)">
				<option value="">Seleccione una columna</option>
			</select>
			<select name="foreign_key_table[]" id="foreign_key_table" onchange="actualizarCamposForeignKey(this)">
				<option value="">Seleccione una tabla</option>
			</select>
			<select name="foreign_key_reference_column[]" id="foreign_key_reference_column">
				<option value="">Seleccione una columna de referencia</option>
			</select>
		</div>
		<label>Comentarios:</label>
		<textarea name="comentarios"></textarea>
		<input type="submit" value="Crear tabla">
	</form>
</body>
<script>
    function agregarColumna() {
    var columnas = document.getElementById("columnas");
    var nuevaColumna = document.createElement("div");
    nuevaColumna.innerHTML = '<label>Nombre de la columna:</label>' +
        '<input type="text" name="columnas[]" required>' +
        '<label>Tipo de dato:</label>' +
        '<select name="tipos[]" required>' +
        '<option value="int">Entero</option>' +
        '<option value="varchar">Cadena de texto</option>' +
        '<option value="date">Fecha</option>' +
        '</select>' +
        '<label>Longitud:</label>' +
        '<input type="number" name="longitudes[]">' +
        '<label>Clave primaria:</label>' +
        '<input type="checkbox" name="primary[]">' +
        '<label>No nulo:</label>' +
        '<input type="checkbox" name="notnull[]">' +
        '<button type="button" onclick="eliminarColumna(this)">Eliminar columna</button>';
    columnas.appendChild(nuevaColumna);
}

function eliminarColumna(boton) {
    var columna = boton.parentNode;
    columna.parentNode.removeChild(columna);
}

function actualizarCamposForeignKey(select) {
    var tabla = document.getElementById("foreign_key_table");
    var columna = document.getElementById("foreign_key_column");
    var referencia = document.getElementById("foreign_key_reference_column");
    var tablaSeleccionada = tabla.value;
    var columnaSeleccionada = columna.value;
    // Si se seleccionó una tabla y una columna
    if (tablaSeleccionada && columnaSeleccionada) {
        // Obtener la lista de columnas de la tabla seleccionada
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var columnas = JSON.parse(xhr.responseText);
                // Actualizar la lista de columnas de referencia
                referencia.innerHTML = '<option value="">Seleccione una columna de referencia</option>';
                for (var i = 0; i < columnas.length; i++) {
                    var columnaActual = columnas[i];
                    if (columnaActual != columnaSeleccionada) {
                        var opcion = document.createElement("option");
                        opcion.value = columnaActual;
                        opcion.text = columnaActual;
                        referencia.appendChild(opcion);
                    }
                }
            }
        };
        xhr.open("GET", "obtener_columnas.php?tabla=" + tablaSeleccionada, true);
        xhr.send();
    } else {
        // Limpiar la lista de columnas de referencia
        referencia.innerHTML = '<option value="">Seleccione una columna de referencia</option>';
    }
}
window.onload = function() {
    // Obtener la lista de tablas y columnas
    var tabla = document.getElementById("foreign_key_table");
    var columna = document.getElementById("foreign_key_column");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var tablas = JSON.parse(xhr.responseText);
            // Actualizar la lista de tablas y columnas
            tabla.innerHTML = '<option value="">Seleccione una tabla</option>';
            columna.innerHTML = '<option value="">Seleccione una columna</option>';
            for (var i = 0; i < tablas.length; i++) {
                var tablaActual = tablas[i];
                var opcionTabla = document.createElement("option");
                opcionTabla.value = tablaActual;
                opcionTabla.text = tablaActual;
                tabla.appendChild(opcionTabla);
                // Obtener la lista de columnas de la tabla actual
                var xhrColumnas = new XMLHttpRequest();
                xhrColumnas.onreadystatechange = function() {
                    if (xhrColumnas.readyState == 4 && xhrColumnas.status == 200) {
                        var columnas = JSON.parse(xhrColumnas.responseText);
                        // Actualizar la lista de columnas
                        for (var j = 0; j < columnas.length; j++) {
                            var columnaActual = columnas[j];
                            var opcionColumna = document.createElement("option");
                            opcionColumna.value = columnaActual;
                            opcionColumna.text = columnaActual;
                            columna.appendChild(opcionColumna);
                        }
                    }
                };
                xhrColumnas.open("GET", "obtener_columnas.php?tabla=" + tablaActual, true);
                xhrColumnas.send();
            }
        }
    };
    xhr.open("GET", "obtener_tablas.php", true);
    xhr.send();
};  
</script>
<style>
    body {
    font-family: Arial, sans-serif;
}

h2 {
    margin-top: 0;
}

label {
    display: block;
    margin-top: 10px;
}

input[type="text"], input[type="number"], select {
    width: 200px;
}

input[type="checkbox"] {
    margin-left: 5px;
}

button[type="submit"], button[type="button"] {
    margin-top: 10px;
    padding: 5px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"]:hover, button[type="button"]:hover {
    background-color: #3e8e41;
}

#columnas {
    margin-top: 10px;
}

#foreign_key {
    margin-top: 10px;
}

#foreign_key_table, #foreign_key_column, #foreign_key_reference_column {
    width: 200px;
}
</style>
</html>

