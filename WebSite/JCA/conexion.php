<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu página</title>
    <link rel="stylesheet" href="http://localhost/SGE/WebSite/JCA/styles.css">
    <script src="http://localhost/SGE/WebSite/JCA/vermas.js"></script>
</head>
<body>
    <?php
    // Datos de conexión a la base de datos
    $servername = "localhost:3307";
    $username = "root";
    $password = "123456";
    $database = "sge"; // Nombre de tu base de datos

    $conexion = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener los datos de las habitaciones
    $consulta = "SELECT * FROM espacios";
    //guardar likes en base de datos 
    $resultado = $conexion->query($consulta);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $salaId = $_POST['salaId'];
        $action = $_POST['action'];
        $likesCount = $_POST['likesCount'];
        $dislikesCount = $_POST['dislikesCount'];
    
        if ($action === 'like') {
            $query = "UPDATE espacios SET likes = likes + 1 WHERE espacioID = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('i', $salaId);
            $stmt->execute();
        } elseif ($action === 'dislike') {
            $query = "UPDATE espacios SET dislikes = dislikes + 1 WHERE espacioID = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('i', $salaId);
            $stmt->execute();
        }
    
        $stmt->close();
    
        echo 'OK';
        exit;
    }

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
            if (isset($fila['ubicacion'])) {
                echo '          <p>Ubicación: ' . $fila['ubicacion'] . '</p>';
            } else {
                echo '          <p>Ubicación: No especificada</p>';
            }
            if (isset($fila['capacidad'])) {
                echo '          <p>Capacidad: ' . $fila['capacidad'] . ' personas</p>';
            } else {
                echo '          <p>Capacidad: No especificada</p>';
            }
            echo '          <p>Disponibilidad: ' . ($fila['disponibilidad'] == 1 ? 'Disponible' : 'No disponible') . '</p>'; // Verifica la disponibilidad y muestra un texto adecuado
                            $modal_id = 'myModal' . $fila['espacioID'];
            echo '          <button class="button" onclick="openModal(\'' . $modal_id . '\')">Ver Más</button>';
            echo '          <!-- Modal -->';
            echo '          <dialog id="' . $modal_id . '">';
            echo '            <span class="close" onclick="closeModal(\'' . $modal_id . '\')">&times;</span>';
            echo '            <h2>' . $fila['nombreEspacio'] . '</h2>';
            echo '          <div class="carousel">';
            echo '    <div class="carousel-inner">';
            echo '      <div class="slide"><img src="imagen-sala1.jpg" alt="Imagen 1"></div>';
            echo '      <div class="slide"><img src="imagen-sala2.jpg" alt="Imagen 2"></div>';
            echo '      <div class="slide"><img src="imagen-sala3.jpg" alt="Imagen 3"></div>';
// Añade más imágenes si es necesario
            echo '    </div>';
            echo '  </div>';
            echo '            <p>Ubicación: ' . (isset($fila['ubicacion']) ? $fila['ubicacion'] : 'No especificada') . '</p>';
            echo '            <p>Capacidad: ' . (isset($fila['capacidad']) ? $fila['capacidad'] . ' personas' : 'No especificada') . '</p>';
            echo '            <p>Disponibilidad: ' . ($fila['disponibilidad'] == 1 ? 'Disponible' : 'No disponible') . '</p>';
            echo '          </dialog>';
            echo '          <button onclick="reservarSala('. $fila['espacioID']. ')" class="button reserva-button">Reservar</button>';
            echo '          <button class="button like-button" data-id="' . $fila['espacioID'] . '" onclick="darLike(' . $fila['espacioID'] . ', ' . $fila['likes'] . ')"><img src="como.png" alt="Like"></button>';
            echo '          <button class="button dislike-button" onclick="darDislike(' . $fila['espacioID'] . ', ' . $fila['dislikes'] . ')"><img src="no-me-gusta.png" alt="disLike"></button>';
            echo '          <span id="likes-' . $fila['espacioID'] . '">' . $fila['likes'] . '</span> Likes - ';
            echo '          <span id="dislikes-' . $fila['espacioID'] . '">' . $fila['dislikes'] . '</span> Dislikes';
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
    <script>
        // Función para abrir el modal correspondiente al ID dado
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.showModal();
        }

        // Función para cerrar el modal correspondiente al ID dado
        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.close();
        }
//carrucel
let currentSlide = 0;

function nextSlide() {
  currentSlide++;
  showSlide();
}

function prevSlide() {
  currentSlide--;
  showSlide();
}

function showSlide() {
  const slides = document.querySelector('.carousel-inner');
  const slideWidth = slides.offsetWidth;
  slides.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

function closeModal(modal_id) {
  const modal = document.getElementById(modal_id);
  modal.close();
}

// Añade este script al final de tu HTML para que funcione correctamente
document.addEventListener("DOMContentLoaded", function() {
  const dialog = document.querySelector('.dialog');
  dialog.showModal();
  showSlide(); // Llamar a la función showSlide() para asegurar que las imágenes se muestran correctamente al abrir el diálogo
});

//FUNCIOONES PARA CONTEO DE LIKES Y Dislikes
function darLike(salaId, likesCount) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'conexion.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            var likesElement = document.getElementById("likes-" + salaId);
            likesCount++;
            likesElement.innerText = likesCount;

            // Actualiza el conteo de likes en la base de datos
            actualizarConteoLikes(salaId, likesCount);
        }
    };

    xhr.send('salaId=' + salaId + '&action=like&likesCount=' + likesCount);
}

function darDislike(salaId, dislikesCount) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'conexion.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            var dislikesElement = document.getElementById("dislikes-" + salaId);
            dislikesCount++;
            dislikesElement.innerText = dislikesCount;

            // Actualiza el conteo de dislikes en la base de datos
            actualizarConteoDislikes(salaId, dislikesCount);
        }
    };

    xhr.send('salaId=' + salaId + '&action=dislike&dislikesCount=' + dislikesCount);
}
    </script>
</body>
</html>
