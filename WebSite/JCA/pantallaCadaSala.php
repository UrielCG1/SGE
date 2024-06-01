<!DOCTYPE html>
<html>
    <head>
        <title>Salas</title> 
    </head>
    <body>    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--DEPENDENCIAS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!--NAV BAR DE LA PAGINA DE SALAS-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark-gray">
            <a class="navbar-brand text-white" href="#">Salas Comunes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link text-white" href="#">Pantalla Principal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#"></a>
                </li>
                
              </ul>
            </div>
          </nav>

          <main>
            <div class="container">
              <?php
                // Incluir el archivo que genera las salas dinámicamente
                include 'conexion.php';
              ?>
            </div>

            <div class="ingresarComentario">
                <button id="btnIngresarComentario">Ingresar Comentario</button>
            </div>
            <!--JS  para mandar a otra ventana para ingresar los comentarios-->
            <script>
              document.getElementById("btnIngresarComentario").addEventListener("click", function() {
                window.location.href = "ingresarComentario.php";
              });
            </script>

            <div class="comentarios">
              
              <?php
                // Establecer la conexión a la base de datos y obtener los datos del array
                // $comentarios_array = ...; (código para obtener el array)
                // Incluir el archivo que contiene el contenido del body
                include 'imprimirJSON.php';
              ?>

            </div>

          </main>
          
    </body>
</html>