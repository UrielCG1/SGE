<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/registro.css">
    
</head>
<body>
    <div class="container">
    <!--    <div class="image"><img src="../images/logo1.png"></div> -->
        <h2>Registro de Usuarios</h2>
        <?php
        include("config.php");
        include("registro.php");
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" name="nombre" required placeholder="Ingresa nombre(s)">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text"name="apellido" required placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <div class="cuenta">
                <input class="boton" type="submit" value="Registrar" name="registro">
                <a href="login.php">Iniciar sesión</a>
            </div>
        </form>
    </div>

<?php

require("config.php")

?>