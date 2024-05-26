<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Sala</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="esActualizacionPrueba()">
    <div class="container wrapper">
        <div id="divH1"><h1>Registrar Nueva Sala</h1> </div>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <label for="nombreEspacio">Nombre de la Sala:</label>
                    <input type="text" id="nombreEspacio" name="nombreEspacio" required>
                </div>
                <div class="col">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="tipoEspacio">Tipo de Sala:</label>
                        <input type="text" id="tipoEspacio" name="tipoEspacio" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" id="ubicacion" name="ubicacion">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="disponibilidad">Disponibilidad (1 para disponible, 0 para no disponible):</label>
                        <input type="number" id="disponibilidad" name="disponibilidad" min="0" max="1" required>

                    <div class="col-sm-6">
                        <label for="capacidad">Capacidad:</label>
                        <input type="number" id="capacidad" name="capacidad" required>
                    </div>
                </div>
            </div>
                <div class="col align-items-center">
                    <button type="submit" id="submitSala" onclick="registrarSala()">Registrar Sala</button>
                    <button type="submit" id="updateSala" onclick="actualizarSala(id_update)">Actualizar Sala</button>
                </div>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    let  esActualizacion = false;
    // ¿Se va actualizar una sala?
    const id_update = new URLSearchParams(window.location.search).get('id_sala');
    console.log("id_update: " + id_update)
    function esActualizacionPrueba(){
        if (id_update !== null && id_update !== '') {
            console.log("SÍ ES ACTUALIZACION")
            cargarDatosSala(id_update);
            actualizarTituloH1(id_update);
            showButton("updateSala");
            hideButton("submitSala");
            esActualizacion = true;
        }else{
            console.log("NO ES ACTUALIZACION")
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
    function showButton(id_button){
        var button = document.getElementById(id_button);
        button.style.display = "inline-block";
    }
    function hideButton(id_button){
        var button = document.getElementById(id_button);
        button.style.display = "none";
    }

    function registrarSala(){

        var nombreEspacio =  document.getElementById("nombreEspacio");
        var descripcion =  document.getElementById("descripcion");
        var tipoEspacio =  document.getElementById("tipoEspacio");
        var disponibilidad =  document.getElementById("disponibilidad");
        var ubicacion =  document.getElementById("ubicacion");
        var capacidad =  document.getElementById("capacidad");

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
                if (response.ok) { //respuesta
                    Swal.fire({
                        title: "¡Sala registrada exitosamente!",
                        icon: "success"
                    });
                } else {
                    throw "Error en la llamada Ajax";
                }
            })
            .then(function (texto) {
                console.log(texto);
            })
            .catch(function (err) {
                console.log(err);
            });
    }

    function actualizarSala(id_update){

        var nombreEspacio =  document.getElementById("nombreEspacio");
        var descripcion =  document.getElementById("descripcion");
        var tipoEspacio =  document.getElementById("tipoEspacio");
        var disponibilidad =  document.getElementById("disponibilidad");
        var ubicacion =  document.getElementById("ubicacion");
        var capacidad =  document.getElementById("capacidad");

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
                if (response.ok) { //respuesta
                    Swal.fire({
                        title: "¡Sala actualizada exitosamente!",
                        icon: "success"
                    });
                } else {
                    throw "Error en la llamada Ajax";
                }
            })
            .then(function (texto) {
                console.log(texto);
            })
            .catch(function (err) {
                console.log(err);
            });
    }

    function cargarDatosSala(id_update){
        $.getJSON('daoCargarDatosSala.php?id_sala=' + id_update,  function (response) {
            var data = response.data[0];

        var nombreEspacio =  document.getElementById("nombreEspacio");
        var descripcion =  document.getElementById("descripcion");
        var tipoEspacio =  document.getElementById("tipoEspacio");
        var disponibilidad =  document.getElementById("disponibilidad");
        var ubicacion =  document.getElementById("ubicacion");
        var capacidad =  document.getElementById("capacidad");

        nombreEspacio.value = data.nombreEspacio;
        descripcion.value = data.descripcion;
        tipoEspacio.value = data.tipoEspacio;
        disponibilidad.value = data.disponibilidad;
        ubicacion.value = data.ubicacion;
        capacidad.value = data.capacidad;

        }).then(function() {
            console.log("Datos consultados exitosamente");
        }).catch(function(error) {
            // Manejar errores si la solicitud falla
            console.error('Error en la solicitud JSON: ', error);
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>