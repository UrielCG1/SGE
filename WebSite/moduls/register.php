<!DOCTYPE html>
<html lang="es">
<head>
    <title>SGE | Registro de Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="css/date-time-picker-component.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Old+Standard+TT:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="js/modernizr.js"></script>
</head>
<body>
<h2>SGE | Registro de Usuario</h2>
<div class="wrapper">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <label for="nombreR"><i class="las la-user"></i>Nombre</label>
                <input type="text" id="nombreR" name="nombreR" required>
            </div>
            <div class="col">
                <label for="correoR"><i class="las la-envelope"></i>Correo Electrónico</label>
                <input type="email" id="correoR" name="correoR" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefonoR"><i class="las la-phone"></i>Teléfono</label>
                <input type="tel" id="telefonoR" name="telefonoR" onchange="validarCorreo()">
            </div>
            <div class="col">
                <label for="fotoR"><i class="las la-image"></i>Foto</label>
                <input type="file" id="fotoR" name="fotoR" accept="image/*">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="empresaR"><i class="las la-city"></i>Empresa</label>
                <input type="text" id="empresaR" name="empresaR">
            </div>
            <div class="col">
                <label for="numero_empleado"><i class="las la-address-card"></i>Número de Empleado</label>
                <input type="text" id="numero_empleado"  id="foto" name="numero_empleado">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="passwordN"><i class="las la-city"></i>Contraseña</label>
                <input type="password" id="passwordN" name="passwordN">
            </div>
            <div class="col">
                <label for="passwordC"><i class="las la-address-card"></i>Confirmar contraseña</label>
                <input type="password" id="passwordC"  name="passwordC" onchange="validarContraseñas()">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="biografiaR"><i class="las la-theater-masks"></i>Biografía</label>
                <textarea id="biografiaR" name="biografiaR" rows="4" ></textarea>
            </div>
        </div>
        <div class="submit-container">
            <button type="submit" class="btn btn-primary" id="btn-save"  onclick="validarFormulario()"><i class="las la-save"></i>Registrarse</button>
        </div>
    </form>
</div>
<script>
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
        var biografia = document.getElementById("biografiaR").value;

        // Verificar si algún campo está vacío
        if (nombre === "" || correo === "" || telefono === "" || empresa === "" || numeroEmpleado === "" || password === "" || confirmarPassword === "" || biografia === "") {
            alert("Por favor completa todos los campos.");
            return false;
        }
        // Verificar si las contraseñas coinciden
        if (password !== confirmarPassword) {
            alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
            return false;
        }

        validarCorreo();

        //Guardar datos
        registrarUsuario();
    }

</script>
</body>
</html>
