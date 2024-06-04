<?php
include("config.php");

$nombre=$_POST["nombre"];
$contraseña=$_POST["password"];

session_start();
$_SESSION['nombreCompleto']=$nombre;

$consulta= "SELECT * FROM usuarios WHERE nombreCompleto='$nombre' and password='$contraseña'";
$resultado= mysqli_query($conn, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header('location: ../index.html');
}else{
    ?>
    <?php
    include("login.php");
    ?>
    <h1>ERROR EN LA AUTENTIFICACIÓN</h1>
   <?php 
}
mysqli_free_result($resultado);
mysqli_close($conn);
?>