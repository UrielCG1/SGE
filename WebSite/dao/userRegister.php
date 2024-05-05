<?php
include_once('connection.php');
require 'daoUsuario.php';

// Verificar si los datos están presentes y asignarlos de manera segura
if(isset( $_POST['nombreR'], $_POST['correoR'], $_POST['telefonoR'], $_FILES['fotoR'], $_POST['empresaR'], $_POST['numero_empleado'], $_POST['biografiaR'], $_POST['passwordN'])) {

    $nombre        = $_POST['nombreR'];
    $correo        = $_POST['correoR'];
    $telefono      = $_POST['telefonoR'];
    $empresa       = $_POST['empresaR'];
    $noEmpleado    = $_POST['numero_empleado'];
    $biografia      =  $_POST['biografiaR'];
    $password      =  $_POST['passwordN'];

    if ($_FILES["fotoR"]["error"] > 0) {
        echo "Error: " . $_FILES["fotoR"]["error"];
    } else {
        $fechaActual = date('Y-m-d_H-i-s');
        $target_dir = "../images/";
        $archivo = $_FILES['fotoR']['name'];
        $imgName = $fechaActual . '-' . $noEmpleado;
        $img = $target_dir . $imgName;

        $tipo = $_FILES['fotoR']['type'];
        $tamano = $_FILES['fotoR']['size'];
        $temp = $_FILES['fotoR']['tmp_name'];
        $moverImgFile = "../images/" . $imgName;

        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $extensionesPermitidas = array("gif", "jpeg", "jpg", "png");

        if (in_array($extension, $extensionesPermitidas)) {
            if (move_uploaded_file($temp, $moverImgFile)) {
                echo "La imagen " . htmlspecialchars($imgName) . " ha sido subida correctamente.";
                RegistrarUsuario($nombre ,$correo, $telefono, $img,$empresa,$noEmpleado,$biografia,$password);
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
function RegistrarUsuario($nombre ,$correo, $telefono, $img,$empresa,$noEmpleado,$password)
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

        $insertUsuario = "INSERT INTO `Usuarios` (`userId`, `nombreCompleto`, `email`, `password`, `telefono`, `empresa`, `fotoUsuario`) 
                                VALUES ('$noEmpleado', '$nombre', '$correo', '$passwordS', '$telefono', '$empresa','$img')";
        $rInsertUsuario = mysqli_query($conex, $insertUsuario);

        mysqli_close($conex);

        if (!$rInsertUsuario) {
            echo '<script>alert("Error al registrar el usuario")</script>';
            return 0;
        } else {
            echo '<script>alert("Usuario registrado exitosamente")</script>';
            return 1;
        }
    }
}
?>