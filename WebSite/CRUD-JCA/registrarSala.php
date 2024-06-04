<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Sala</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body onload="esActualizacionPrueba()">
    <div class="container wrapper">
        <div id="divH1"><h1>Registrar Nueva Sala</h1></div>

        <form id="formSala">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <label for="nombreEspacio">Nombre de la Sala:</label>
                            <input type="text" id="nombreEspacio" name="nombreEspacio" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipoEspacio">Tipo de Sala:</label>
                            <input type="text" id="tipoEspacio" name="tipoEspacio" required>
                        </td>
                        <td>
                            <label for="ubicacion">Ubicación:</label>
                            <input type="text" id="ubicacion" name="ubicacion">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="disponibilidad">Disponibilidad <small>(1 para SÍ, 0 para NO)</small>:</label>
                            <input type="number" id="disponibilidad" name="disponibilidad" min="0" max="1" required>
                        </td>
                        <td>
                            <label for="capacidad">Capacidad:</label>
                            <input type="number" id="capacidad" name="capacidad" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="boton" id="submitSala" onclick="registrarSala()">Registrar Sala</button>
                            <button type="button" class="boton" id="updateSala" onclick="actualizarSala(id_update)">Actualizar Sala</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script type="text/javascript">
        let esActualizacion = false;
        const id_update = new URLSearchParams(window.location.search).get('id_sala');
        console.log("id_update: " + id_update);

        function esActualizacionPrueba() {
            if (id_update !== null && id_update !== '') {
                console.log("SÍ ES ACTUALIZACION");
                cargarDatosSala(id_update);
                actualizarTituloH1(id_update);
                showButton("updateSala");
                hideButton("submitSala");
                esActualizacion = true;
            } else {
                console.log("NO ES ACTUALIZACION");
                hideButton("updateSala");
            }
        }

        function actualizarTituloH1(id_update) {
            var divh1 = document.querySelector("#divH1");
            var titulo1 = divh1.querySelector("h1");

            if (titulo1) {
                titulo1.textContent = "Actualizar Sala con identificador " + id_update;
            }
        }

        function showButton(id_button) {
            var button = document.getElementById(id_button);
            button.style.display = "inline-block";
        }

        function hideButton(id_button) {
            var button = document.getElementById(id_button);
            button.style.display = "none";
        }

        function registrarSala() {
            var nombreEspacio = document.getElementById("nombreEspacio");
            var descripcion = document.getElementById("descripcion");
            var tipoEspacio = document.getElementById("tipoEspacio");
            var disponibilidad = document.getElementById("disponibilidad");
            var ubicacion = document.getElementById("ubicacion");
            var capacidad = document.getElementById("capacidad");

            const data = new FormData();
            data.append('nombreEspacio', nombreEspacio.value.trim());
            data.append('descripcion', descripcion.value.trim());
            data.append('tipoEspacio', tipoEspacio.value.trim());
            data.append('disponibilidad', disponibilidad.value.trim());
            data.append('ubicacion', ubicacion.value.trim());
            data.append('capacidad', capacidad.value.trim());

            fetch('register_room.php', {
                method: 'POST',
                body: data
            })
            .then(function (response) {
                if (response.ok) {
                    Swal.fire({
                        title: "¡Sala registrada exitosamente!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = 'consultarSalas.php'; // Redirigir después del registro
                    });
                } else {
                    throw "Error en la llamada Ajax";
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }

        function actualizarSala(id_update) {
            var nombreEspacio = document.getElementById("nombreEspacio");
            var descripcion = document.getElementById("descripcion");
            var tipoEspacio = document.getElementById("tipoEspacio");
            var disponibilidad = document.getElementById("disponibilidad");
            var ubicacion = document.getElementById("ubicacion");
            var capacidad = document.getElementById("capacidad");

            const data = new FormData();
            data.append('id_sala', id_update);
            data.append('nombreEspacio', nombreEspacio.value.trim());
            data.append('descripcion', descripcion.value.trim());
            data.append('tipoEspacio', tipoEspacio.value.trim());
            data.append('disponibilidad', disponibilidad.value.trim());
            data.append('ubicacion', ubicacion.value.trim());
            data.append('capacidad', capacidad.value.trim());

            fetch('daoActualizarSala.php', {
                method: 'POST',
                body: data
            })
            .then(function (response) {
                if (response.ok) {
                    Swal.fire({
                        title: "¡Sala actualizada exitosamente!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = 'consultarSalas.php'; // Redirigir después de la actualización
                    });
                } else {
                    throw "Error en la llamada Ajax";
                }
            })
            .catch(function (err) {
                console.log(err);
            });
        }

        function cargarDatosSala(id_update) {
            $.getJSON('daoCargarDatosSala.php?id_sala=' + id_update, function (response) {
                var data = response.data[0];
                document.getElementById("nombreEspacio").value = data.nombreEspacio;
                document.getElementById("descripcion").value = data.descripcion;
                document.getElementById("tipoEspacio").value = data.tipoEspacio;
                document.getElementById("disponibilidad").value = data.disponibilidad;
                document.getElementById("ubicacion").value = data.ubicacion;
                document.getElementById("capacidad").value = data.capacidad;
            })
            .then(function () {
                console.log("Datos consultados exitosamente");
            })
            .catch(function (error) {
                console.error('Error en la solicitud JSON: ', error);
            });
        }
    </script>
</body>
</html>
