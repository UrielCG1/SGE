<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_test"; // Nombre de tu base de datos

$conexion = new mysqli('localhost', 'root', '', 'db_test');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener los datos de las habitaciones
$consulta = "SELECT * FROM espacios";
$resultado = $conexion->query($consulta);

// Mostrar las habitaciones en una tabla HTML
if ($resultado->num_rows > 0) {
    echo '<main>';
    echo '  <div class="container">';
    echo '    <div class="row">';
    while ($fila = $resultado->fetch_assoc()) {
        echo '      <div class="col-md-4">';
        echo '        <div class="sala">';
        echo '          <img src="imagen-sala1.jpg" alt="Sala 1"';
        echo '          <h2>' . $fila['nombreEspacio'] . '</h2>';
        echo '          <p>Ubicación: ' . $fila['ubicacion'] . '</p>';
        echo '          <p>Capacidad: ' . $fila['capacidad'] . ' personas</p>';
        echo '          <p>Disponibilidad: ' . ($fila['disponibilidad'] == 1 ? 'Disponible' : 'No disponible') . '</p>'; // Verifica la disponibilidad y muestra un texto adecuado
        echo '          <button onclick="reservarSala(' . $fila['espacioID'] . ')" class="reserva-button">Reservar</button>';
        echo '          <button class="like-button" onclick="darLike(' . $fila['espacioID'] . ')">Like</button>';
        echo '          <button class="dislike-button" onclick="darDislike(' . $fila['espacioID'] . ')">Dislike</button>';
        echo '          <span id="likes-' . $fila['espacioID'] . '">0</span> Likes - ';
        echo '          <span id="dislikes-' . $fila['espacioID'] . '">0</span> Dislikes';
        echo '        </div>';
        echo '      </div>';
    }
    echo '    </div>';
    echo '  </div>';
    echo '</main>';
} else {
    echo 'No se encontraron habitaciones.';
}

// Cerrar conexión
$conexion->close();
?>