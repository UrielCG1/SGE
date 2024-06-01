<?php
// Establece la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_test";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$espacioID_key = $_POST['espacioID_key'];
$cliente = $_POST['cliente'];
$comentario = $_POST['comentario'];

// Prepara la consulta SQL para insertar el comentario
$sql = "UPDATE `evaluacion_espacio`
        SET `comentarios` = JSON_ARRAY_APPEND(
            IFNULL(`comentarios`, JSON_ARRAY()),
            '$',
            JSON_OBJECT(\"cliente\", \"$cliente\", \"comentario\", \"$comentario\")
        )
        WHERE `espacioID_key` = $espacioID_key";

// Ejecuta la consulta y verifica si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Comentario agregado exitosamente.";
} else {
    echo "Error al agregar el comentario: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
