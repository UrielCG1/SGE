<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Comentarios</title>
    <link rel="stylesheet" href="stylesComentarios.css">

</head>
<body>
    <h1>Formulario de Comentarios</h1>
    <form action="procesar_formulario.php" method="POST">
        <label for="espacioID_key">ID del Espacio:</label>
        <select id="espacioID_key" name="espacioID_key" required>
            <option value="">Selecciona un espacioID_key</option>
            <?php
            // Establece la conexión con la base de datos 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_test";

            // Crea la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica la conexión
            if ($conn->connect_error) {
                die("Error en la conexión: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los espacioID_key de la tabla evaluacion_espacio
            $sql = "SELECT espacioID_key FROM evaluacion_espacio";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Genera las opciones del menú desplegable con los espacioID_key
                    echo "<option value='" . $row["espacioID_key"] . "'>" . $row["espacioID_key"] . "</option>";
                }
            }

            // Cierra la conexión
            $conn->close();
            ?>
        </select><br><br>

        <label for="cliente">Cliente:</label>
        <input type="text" id="cliente" name="cliente" required><br><br>

        <label for="comentario">Comentario:</label><br>
        <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Enviar Comentario">
    </form>
</body>
</html>
