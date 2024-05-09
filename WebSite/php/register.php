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
    <link href="http://localhost/SGE/WebSite/css/date-time-picker-component.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Old+Standard+TT:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="http://localhost/SGE/WebSite/js/modernizr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<h2>SGE | Registro de Usuario</h2>
<div class="wrapper" id="divRegister">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <label for="nombreR"><i class="las la-user"></i>Nombre</label>
                <input type="text" id="nombreR" name="nombreR" required>
            </div>
            <div class="col">
                <label for="correoR"><i class="las la-envelope"></i>Correo Electrónico</label>
                <input type="email" id="correoR" name="correoR" onchange="validarCorreo()" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="telefonoR"><i class="las la-phone"></i>Teléfono</label>
                <input type="tel" id="telefonoR" name="telefonoR">
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
                <label for="numEmpleado"><i class="las la-address-card"></i>Número de Empleado</label>
                <input type="text" id="numEmpleado"  id="foto" name="numEmpleado">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="passwordN"><i class="las la-city"></i>Contraseña</label>
                <input type="password" id="passwordN" name="passwordN">
            </div>
            <div class="col">
                <label for="passwordC"><i class="las la-address-card"></i>Confirmar contraseña</label>
                <input type="password" id="passwordC"  name="passwordC" onchange="validarPassword();">
            </div>
        </div>
        <div class="submit-container">
            <button type="submit" class="btn btn-primary" id="btn-save"  onclick="  registrarUsuario()"><i class="las la-save"></i>Registrarse</button>
        </div>
    </form>
</div>
<script src="http://localhost/SGE/WebSite/js/insertarDatos.js"></script>
</body>
</html>
