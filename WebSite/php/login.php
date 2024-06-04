<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="../css/register.css">
</head>
<body>

<div class="login-container wrapper" id="divLogin">
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
      <div><input type="submit" class="submit"  value="Entrar"></div>  
      <div class="regis">
        <button class="btn btn-secundary" id="iniciarSesionBtn"><a href="register.php">Registrar</a></button>
      </div>
      <div class="pass">
        <a href="forgotpass.php">Olvidaste contraseña</a>
      </div>   
    </form>
</div>
</body>
</html>
