<?php
$servername = "localhost";  // Cambiar si es necesario
$username = "root";         // Cambiar si es necesario
$password = "";             // Cambiar si es necesario
$dbname = "db_test";        // Cambiar si es necesario

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombreEspacio = $_POST["nombreEspacio"];
    $descripcion = $_POST["descripcion"];
    $tipoEspacio = $_POST["tipoEspacio"];
    $disponibilidad = $_POST["disponibilidad"];
    $ubicacion = $_POST["ubicacion"];
    $capacidad = $_POST["capacidad"];

    // Preparar y ejecutar consulta de inserción
    $stmt = $conn->prepare("INSERT INTO espacios (nombreEspacio, descripcion, tipoEspacio, disponibilidad, ubicacion, capacidad) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisi", $nombreEspacio, $descripcion, $tipoEspacio, $disponibilidad, $ubicacion, $capacidad);

    if ($stmt->execute()) {
        echo "Nueva sala registrada con éxito";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
