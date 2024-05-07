<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conexion = mysqli_connect("127.0.0.1:3306","root","","mydb");

if($conexion){
    echo 'Conexión exitosa';
}else{
    echo 'Conexión fallida';
}
?>