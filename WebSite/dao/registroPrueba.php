<?php

// Verificar si los datos están presentes y asignarlos de manera segura
if(isset( $_POST['nombreR'], $_POST['correoR'],$_POST['passwordN'], $_POST['telefonoR'], $_POST['empresaR'], $_POST['numEmpleado'], $_FILES['fotoR'])) {


    $nombre = $_POST['nombreR'];
    $correo = $_POST['correoR'];
    $telefono = $_POST['telefonoR'];
    $empresa = $_POST['empresaR'];
    $noEmpleado = $_POST['numEmpleado'];

    $fechaActual = date('Y-m-d_H-i-s');
    $target_dir = "../images/usuarios/";
    $archivo = $_FILES['fotoR']['name'];
    $imgName = $fechaActual . '-' . str_replace(' ', '', $nombre);

    // Obtener la extensión del archivo
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $extensionesPermitidas = array("gif", "jpeg", "jpg", "png");

    // Verificar si la extensión es válida
    if (!in_array($extension, $extensionesPermitidas)) {
        return array('success' => false, 'message' => "Error: La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .jpg, .png y un tamaño máximo de 2 MB.");
    }

    // Agregar la extensión al nombre de la imagen
    $img = $target_dir . $imgName . '.' . $extension;

    // Mover el archivo subido a la carpeta destino
    if (!move_uploaded_file($_FILES['fotoR']['tmp_name'], $img)) {
        return array('success' => false, 'message' => "Error: Hubo un error al subir la imagen.");
    }

    // Llamar a la función
    if(RegistrarUsuario($nombre, $correo, $telefono, $img, $empresa, $noEmpleado, $password)) {
        echo '<script>alert("Usuario registrado exitosamente")</script>';
    } else {
        echo '<script>alert("Error al registrar el usuario")</script>';
    }
} else {
    echo '<script>alert("Error: Faltan datos en el formulario")</script>';
}


function RegistrarUsuario($nombre, $correo, $telefono, $img, $empresa, $noEmpleado, $password)
{
    $passwordS = sha1($password);
    $resultado = Usuario($Nomina);

    if ($resultado['success']) {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=http://localhost/SGE/WebSite/php/register.php'>";
        echo '<script>alert("El usuario ya existe, verifique sus datos")</script>';
        return 0;
    } else {
        $con = new LocalConector();
        $conex = $con->conectar();

        $insertUsuario = "INSERT INTO `usuarios` (`nombreCompleto`, `email`, `password`, `telefono`, `empresa`, `fotoUsuario`, `numEmpleado`) 
                                          VALUES ('$nombre', '$correo', '$passwordS', '$telefono', '$empresa', '$img', '$noEmpleado')";
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