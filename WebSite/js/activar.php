 <?php
require '../dao/daoUsuario.php';
require '../dao/functions.php';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso de activación de cuenta</title>
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
<div id="usuarioActivado" class="wrapper" style="display: block; max-width: 550px; text-align:center;">
    <h2>¡Cuenta activada!</h2>
    <p>¡Bienvenido a SGE! ¡Ya puedes iniciar sesión, para hacerlo haz click en el botón:</p>
    <p><a href='iniciosesion.php' style='text-align:center; color: #d7c1a8; text-decoration: none; font-weight: bold; font-size: 1.3rem '>Iniciar Sesión</a></p>
</div>


</body>
</html>
