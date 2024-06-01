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