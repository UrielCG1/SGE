<?php
/*CONFIGURA LA SALIDA DE ERRORES DE LA PANTALLA
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('SITE_URL', 'http://localhost/htdocs/The_beatles/');
define('SITE_TIMEZONE', 'American/Mexico_City');
define('SITE_LANG', ['es', 'spa', 'es_ES']);
//CONEXIÓN A BASE DE DATOS
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'beatles');
define('DB_PORT', '3306');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php*/
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sge";


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
