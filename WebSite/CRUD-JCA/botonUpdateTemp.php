<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador | Gestionar Salas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Panel de Administrador | Gestionar Salas</h1>
    <div class="text-right mb-3">
        <a href="registrarSala.php" class="btn btn-primary">Crear Sala</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>ID Sala</th>
            <th>Nombre de la Sala</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Sala de Networking</td>
            <td><a href="registrarSala.php?id_sala=1"  class="action-link update-link btn btn-warning">Actualizar</a>
            <a href="eliminarSala.php?id=1" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sala de Seguridad Informática</td>
            <td><a href="registrarSala.php?id_sala=2"  class="action-link update-link btn btn-warning">Actualizar</a>
            <a href="eliminarSala.php?id=2" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sala de Desarrollo Ágil</td>
            <td><a href="registrarSala.php?id_sala=3"  class="action-link update-link btn btn-warning">Actualizar</a>
            <a href="eliminarSala.php?id=3" class="btn btn-danger">Eliminar</a></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

<!-- Bootstrap JS and dependencies -->
<script  src="../js/cargarDatos.js"> </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
