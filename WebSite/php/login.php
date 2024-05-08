<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="login-container">
  <div class="image"><img src="../images/LogoSGE.png"></div>
    <h2>Iniciar sesión</h2>
    <form action="validar.php" method="post">
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div><input type="submit" value="Entrar"></div>  
      <div class="regis">
        <button><a href="registro_usuarios.php">Registrar</a></button>
      </div>
      <div class="pass">
        <a href="olvidaste_contraseña.php">Olvidaste contraseña</a>
      </div>   
    </form>
</div>
</body>
</html>
