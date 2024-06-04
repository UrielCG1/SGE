<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Capacidad</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Reporte de Capacidad</h1>
    <table id="tablaCapacidad" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th class="centrado">No.</th>
            <th class="centrado">Sala</th>
            <th class="centrado">Capacidad</th>
        </tr>
        </thead>
        <tbody>
        <!-- Los datos se cargarán aquí con DataTables -->
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tablaCapacidad').DataTable({
            ajax: {
                url: "daoCargarDatosCapacidad.php",
                dataSrc: 'data'
            },
            columns: [
                { data: "ID Sala" },
                { data: "Nombre de la Sala" },
                { data: "Capacidad" }
            ]
        });
    });
</script>
</body>
</html>
