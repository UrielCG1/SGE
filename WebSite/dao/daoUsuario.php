<?php

include_once('connection.php');

function Usuario($noEmpleado){
    $con = new LocalConector();
    $conexion=$con->conectar();

    $consP="SELECT userId, fotoUsuario, nombreCompleto, password,email,telefono, empresa,fk_idRol FROM usuarios WHERE userId = '$noEmpleado'";
    $rsconsPro=mysqli_query($conexion,$consP);

    mysqli_close($conexion);

    if(mysqli_num_rows($rsconsPro) == 1){
        $row = mysqli_fetch_assoc($rsconsPro);
        return array(
            'success' => true, // Indicador de éxito
            'tipoUsuario' => $row['fk_idRol'],
            'password_bd' => $row['password'],
            'nombreUsuario' => $row['nombreCompleto'],
            'idUser' => $row['userId'],
            'emailUsuario' => $row['email'],
            'foto' => $row['fotoUsuario'],
            'telefono' => $row['telefono'],
            'empresa' => $row['empresa']
        );
    }
    else{
        return array(
            'success' => false
        );
    }
}

?>