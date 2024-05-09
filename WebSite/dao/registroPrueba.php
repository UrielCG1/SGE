<?php
$nombre = $postData['nombreR'];
    $correo = $postData['correoR'];
    $telefono = $postData['telefonoR'];
    $empresa = $postData['empresaR'];
    $noEmpleado = $postData['numEmpleado'];
    $password = $postData['passwordN'];

    $fechaActual = date('Y-m-d_H-i-s');
    $target_dir = "../images/usuarios/";
    $archivo = $_FILES['fotoR']['name'];
    $imgName = $fechaActual . '-' . str_replace(' ', '', $nombre);
    $img = $target_dir . $imgName;

    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $extensionesPermitidas = array("gif", "jpeg", "jpg", "png");

    if (!in_array($extension, $extensionesPermitidas)) {
        return array('success' => false, 'message' => "Error: La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .jpg, .png y un tamaño máximo de 2 MB.");
    }

    if (!move_uploaded_file($_FILES['fotoR']['tmp_name'], $img)) {
        return array('success' => false, 'message' => "Error: Hubo un error al subir la imagen.");
    }

RegistrarUsuario($nombre, $correo, $telefono, $img, $empresa, $noEmpleado, $password);



function RegistrarUsuario($nombre, $correo, $telefono, $img, $empresa, $noEmpleado, $password)
{

        $con = new LocalConector();
        $conex = $con->conectar();
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO `Usuarios` (`nombreCompleto`, `email`, `password`, `telefono`, `empresa`, `fotoUsuario`, `numEmpleado`) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $nombre, $correo, $password, $telefono, $empresa, $img, $noEmpleado);

        if ($stmt->execute()) {
            return $mysqli->insert_id;
        } else {
            return 0;
        }

}
?>