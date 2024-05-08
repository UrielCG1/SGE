<?php

include("config.php");

if (isset($_POST['registro'])){
    if(strlen($_POST['nombre']) >= 1  && strlen($_POST['apellido']) >= 1 && strlen($_POST['password']) >= 1){
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellido']);
        $contraseña = trim($_POST["password"]);
        $consulta = "INSERT INTO usuarios(nombre, apellido, password) VALUES ('$nombre','$apellidos', '$contraseña')";
        
        $resultado = mysqli_query($conn, $consulta);

        if($resultado) {
            echo "¡Te has suscrito exitosamente!";
        }
        else{
            echo "Error al suscribirse: " . $conn->error;
        }
    } else{
        echo "¡Por favor complete los campos";
    }
}
?>