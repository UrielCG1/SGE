<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Sala</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body onload="esActualizacionPrueba()">
    <div class="container">
        <div id="divH1"><h1>Registrar Nueva Sala</h1> </div>

        <form action="register_room.php" method="post">
            <label for="nombreEspacio">Nombre de la Sala:</label>
            <input type="text" id="nombreEspacio" name="nombreEspacio" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="tipoEspacio">Tipo de Sala:</label>
            <input type="text" id="tipoEspacio" name="tipoEspacio" required>

            <label for="disponibilidad">Disponibilidad (1 para disponible, 0 para no disponible):</label>
            <input type="number" id="disponibilidad" name="disponibilidad" min="0" max="1" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion">

            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" required>

            <button type="submit" id="submitSala">Registrar Sala</button>
            <button type="submit" id="updateSala">Actualizar Sala</button>
        </form>
    </div>
</body>
</html>

<script  src="../js/cargarDatos.js"> </script>
<script type="text/javascript">
    let  esActualizacion = false;
    // ¿Se va actualizar una sala?
    const id_update = new URLSearchParams(window.location.search).get('id_sala');
    console.log("id_update: " + id_update)
    function esActualizacionPrueba(){
        if (id_update !== null && id_update !== '') {
            console.log("SÍ ES ACTUALIZACION")
            //cargarDatosPrueba(id_update);
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

        var nombreEspacio = id("nombreEspacio");
        var descripcion = id("descripcion");
        var tipoEspacio = id("tipoEspacio");
        var disponibilidad = id("disponibilidad");
        var ubicacion = id("ubicacion");
        var capacidad = id("capacidad");

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
                    alert('Sala registrada')
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
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>