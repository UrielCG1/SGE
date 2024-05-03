<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Consulta SQL para obtener los datos
$consulta = "SELECT * FROM espacios";
$resultado = $conexion->query($consulta);

// Mostrar los datos en una tabla HTML
echo "<table border='1'>";
echo "<tr><th>ESPACIO ID</th><th>Nombre</th><th>Descripción</th><th>Tipo de Espacio</th><th>Disponibilidad</th><th>ESPACIOScol</th><th>Evaluación</th></tr>";

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila["espacioID"] . "</td><td>" . $fila["nombreEspacio"] . "</td><td>" . $fila["descripcion"] . "</td><td>" . $fila["tipoEspacio"] . "</td><td>" . $fila["disponibilidad"] . "</td><td>" . $fila["ESPACIOScol"] . "</td><td>" . $fila["EVALUACION"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>No se encontraron datos</td></tr>";
}

echo "</table>";

// Cerrar la conexión
$conexion->close();
?>