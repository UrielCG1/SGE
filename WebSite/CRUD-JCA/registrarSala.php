<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Sala</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Registrar Nueva Sala</h1>
        <form action="register_room.php" method="post">
            <label for="nombreEspacio">Nombre de la Sala:</label>
            <input type="text" id="nombreEspacio" name="nombreEspacio" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="tipoEspacio">Tipo de Sala:</label>
            <input type="text" id="tipoEspacio" name="tipoEspacio" required>

            <label for="disponibilidad">Disponibilidad (1 para disponible, 0 para no disponible):</label>
            <input type="number" id="disponibilidad" name="disponibilidad" min="0" max="1" required>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion">

            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" required>

            <button type="submit">Registrar Sala</button>
        </form>
    </div>
</body>
</html>
