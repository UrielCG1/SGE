<?php
// Verificar si los datos están presentes y asignarlos de manera segura
/*
include_once('connection.php');
require 'daoUsuario.php';
require 'functions.php';

if(isset( $_POST['nombreR'], $_POST['correoR'], $_POST['telefonoR'], $_FILES['fotoR'], $_POST['empresaR'], $_POST['numEmpleado'], $_POST['passwordN'])) {

    $nombre        = $_POST['nombreR'];
    $correo        = $_POST['correoR'];
    $telefono      = $_POST['telefonoR'];
    $empresa       = $_POST['empresaR'];
    $noEmpleado    = $_POST['numEmpleado'];
    $password      =  $_POST['passwordN'];

    if ($_FILES["fotoR"]["error"] > 0) {
        echo "Error: " . $_FILES["fotoR"]["error"];
    } else {
        $fechaActual = date('Y-m-d_H-i-s');
        $target_dir = "http://localhost/SGE/WebSite/images/usuarios/";
        $archivo = $_FILES['fotoR']['name'];
        $imgName = $fechaActual . '-' . str_replace(' ', '', $nombre);
        $img = $target_dir . $imgName;

        $tipo = $_FILES['fotoR']['type'];
        $tamano = $_FILES['fotoR']['size'];
        $temp = $_FILES['fotoR']['tmp_name'];
        $moverImgFile = "../images/usuarios/" . $imgName;

        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $extensionesPermitidas = array("gif", "jpeg", "jpg", "png");

        if (in_array($extension, $extensionesPermitidas)) {
            if (move_uploaded_file($temp, $moverImgFile)) {
                echo "La imagen " . htmlspecialchars($imgName) . " ha sido subida correctamente.";
                $token = generateToken();
                $registro = RegistrarUsuario($nombre ,$correo, $telefono, $img,$empresa,$noEmpleado,$password, $token);
                if($registro > 0){
                    $url = 'http://'.$_SERVER["SERVER_NAME"].'/login/activar.php?id='.$registro.'&val='.$token;
                    $asunto = 'Activar cuenta | SGE';
                    $cuerpo = "<!DOCTYPE html>
                                <html lang='es'>
                                <head>
                                <meta charset='UTF-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                                <title>Correo Electrónico</title>
                                </head>
                                <body style='font-family: Arial, sans-serif; background-color: #f9f7f5; margin: 0; padding: 0;'>
                                <div class='container' style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #0c0d0c; color: #f9f7f5; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
                                    <h1 style='text-align: center;'>¡Bienvenido!</h1>
                                    <p>Estimado <span style='font-weight: bold;'>$nombre</span>:</p>
                                    <p>Para continuar con el proceso de registro, es indispensable que ingrese al siguiente enlace:</p>
                                    <p><a href='$url' style='color: #bfb3ab; text-decoration: none; font-weight: bold;'>Activar cuenta</a></p>
                                </div>
                                </body>
                                </html>";

                    if(enviarEmail($correo, $nombre,$asunto,$cuerpo)){
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=confirmacionCorreo.php'>";
                        exit;
                    }else{
                        echo "Error al enviar correo electrónico";
                    }
                }else{
                    echo "Error al registrar";
                }
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
            echo "Error. La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .jpg, .png y un tamaño máximo de 2 MB.";
        }
    }
}else {
    echo '<script>alert("Error: Faltan datos en el formulario")</script>';
}
function RegistrarUsuario($nombre ,$correo, $telefono, $img,$empresa,$noEmpleado,$password,$token)
{
    $passwordS = hasPassword($password);
    $resultado = Usuario($noEmpleado);

    if ($resultado['success']) {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=register.php'>";
        echo '<script>alert("El usuario ya existe, verifique sus datos")</script>';
        return 0;
    } else {
        $con = new LocalConector();
        $conex = $con->conectar();
        global $mysqli;

        $stmt = $mysqli -> prepare("INSERT INTO `Usuarios` ( `nombreCompleto`, `email`, `password`, `telefono`, `empresa`, `fotoUsuario`, `token`, `numEmpleado`) 
                                VALUES ( ?, ?, ?, ?, ?,?,?,?)");
        $stmt->bind_param('ssssssss', $nombre, $correo, $passwordS, $telefono, $empresa,$img,$token, $noEmpleado);


        if ($stmt->execute()) {
            return $mysqli->insert_id;
        } else {
            return 0;
        }
    }
}
*/

/*
 function RegistrarUsuario($nombre ,$correo, $telefono, $img,$empresa,$noEmpleado,$password,$token)
{
    $passwordS = sha1($password);
    $resultado = Usuario($noEmpleado);

    if ($resultado['success']) {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=register.php'>";
        echo '<script>alert("El usuario ya existe, verifique sus datos")</script>';
        return 0;
    } else {
        $con = new LocalConector();
        $conex = $con->conectar();

        $insertUsuario = "INSERT INTO `Usuarios` (`userId`, `nombreCompleto`, `email`, `password`, `telefono`, `empresa`, `fotoUsuario`, `token`)
                                VALUES ('$noEmpleado', '$nombre', '$correo', '$passwordS', '$telefono', '$empresa','$img','$token')";
        $rInsertUsuario = mysqli_query($conex, $insertUsuario);

        mysqli_close($conex);

        if (!$rInsertUsuario) {
            return 0;
        } else {
            return 1;
        }
    }
}

 */
?>