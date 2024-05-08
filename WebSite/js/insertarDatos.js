function validarCorreo() {
    var correo = document.getElementById("correoR").value;
    var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo)) {
        alert("Por favor, ingresa un correo electrónico válido.");
        return false;
    }
    return true;
}

function validarFormulario() {
    var nombre = document.getElementById("nombreR").value;
    var correo = document.getElementById("correoR").value;
    var telefono = document.getElementById("telefonoR").value;
    var empresa = document.getElementById("empresaR").value;
    var numeroEmpleado = document.getElementById("numero_empleado").value;
    var password = document.getElementById("passwordN").value;
    var confirmarPassword = document.getElementById("passwordC").value;

    // Verificar si algún campo está vacío
    if (nombre === "" || correo === "" || telefono === "" || empresa === "" || numeroEmpleado === "" || password === "" || confirmarPassword === "") {
        alert("Por favor completa todos los campos.");
        return false;
    }
    // Verificar si las contraseñas coinciden
    if (password !== confirmarPassword) {
        alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
        return false;
    }

    validarCorreo();
    alert("correo valiado");

    //Guardar datos
    registrarUsuario();
}
    
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
    alert("Inicio registrarUsuario");

    var nombreR = id("nombreR");
    var correoR = id("correoR");
    var telefonoR = id("telefonoR");
    var fotoR = id("fotoR");
    var empresaR = id("empresaR");
    var numero_empleado = id("numero_empleado");
    var passwordN = id("passwordN");

    const data = new FormData();

    data.append('nombreR', nombreR.value.trim());
    data.append('correoR', correoR.value.trim());
    data.append('telefonoR', telefonoR.value.trim());
    for (var pair of data.entries()) {
        formDataString += pair[0] + ': ' + pair[1] + '\n';
    }
    alert(formDataString);


    // Validar la imagen antes de adjuntarla al FormData
    if (fotoR.files.length > 0) {
        validarImagen(fotoR.files[0]);
        data.append('fotoR', fotoR.files[0]);
        alert("foto:",fotoR.files[0]);
    } else {
        throw "Por favor seleccione una imagen";
    }

    data.append('empresaR', empresaR.value.trim());
    data.append('numero_empleado', numero_empleado.value.trim());
    data.append('passwordN', passwordN.value.trim());

    var formDataString = '';

    for (var pair of data.entries()) {
        formDataString += pair[0] + ': ' + pair[1] + '\n';
    }
    alert(formDataString);


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
