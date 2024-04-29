function validarImagen(file) {
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(file.name)) {
        throw "Solo se permiten archivos de imagen con extensiones .jpg, .jpeg, .png, o .gif";
    }

    const maxSizeInBytes = 5 * 1024 * 1024; // 10 MB
    if (file.size > maxSizeInBytes) {
        throw "El tamaño del archivo es demasiado grande. Por favor seleccione una imagen más pequeña (menos de 10 MB).";
    }
}
function registrarUsuario(){

    var nombreR = id("nombreR");
    var correoR = id("correoR");
    var telefonoR = id("telefonoR");
    var fotoR = id("fotoR");
    var empresaR = id("empresaR");
    var numero_empleado = id("numero_empleado");
    var biografiaR = id("biografiaR");
    var passwordN = id("passwordN");

    const data = new FormData();

    data.append('nombreR', nombreR.value.trim());
    data.append('correoR', correoR.value.trim());
    data.append('telefonoR', telefonoR.value.trim());

    // Validar la imagen antes de adjuntarla al FormData
    if (fotoR.files.length > 0) {
        validarImagen(fotoR.files[0]);
        data.append('fotoR', fotoR.files[0]);
    } else {
        throw "Por favor seleccione una imagen";
    }

    data.append('empresaR', empresaR.value.trim());
    data.append('numero_empleado', numero_empleado.value.trim());
    data.append('biografiaR', biografiaR.value.trim());
    data.append('passwordN', passwordN.value.trim());

    fetch('../dao/userRegister.php', {
        method: 'POST',
        body: data
    })
        .then(function (response) {
            if (response.ok) { //respuesta
                window.location.href = "confirmacionCorreo.php";
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
