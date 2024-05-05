<?php
require_once 'pruebaConexion.php';

$connection = new Connection();

if ($connection->connect_error) {
    die("Error al conectarse a la base de datos: " . $connection->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}

$connection->close();
?>

