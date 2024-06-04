<?php

require 'daoUsuario.php';

if(isset($_POST['iniciarSesionBtn'])){

    session_start();
    $Nomina = $_POST['numNomina'];
    $resultado = Usuario($Nomina);

    if($resultado['success']){
        $_SESSION['numNomina'] = $Nomina;
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['nombreUsuario']= $resultado['nombreUsuario'];
        $_SESSION['tipoUsuario']= $resultado['tipoUsuario'];
        $_SESSION['nomina']= $resultado['idUser'];
        $_SESSION['emailUsuario']= $resultado['emailUsuario'];
        $_SESSION['fotoUsuario']= $resultado['foto'];

        $password_bd = $resultado['password_bd'];
        $tipoUsuario = $_SESSION['tipoUsuario'];

        $passwordS = sha1($_POST['password']);

        if($password_bd == $passwordS){
            echo "<script>alert('Acceso correcto')</script>";
        } else {
            echo "<script>alert('Contraseña incorrecta, verifique sus datos')</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe')</script>";
    }
}

if(isset($_POST['cerrarSesion'])){
    session_start();
    session_destroy();
    echo "<script>alert('Sesión cerrada exitosamente')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../php/login.php'>";
}

?>
