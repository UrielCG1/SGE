<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador | Gestionar Salas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Panel de Administrador | Gestionar Salas</h1>
    <div class="text-right mb-3">
        <a href="registrarSala.php" class="btn btn-primary">Crear Sala</a>
    </div>
    <!-- Tabla existente -->
    <!--
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
            <td>
                <a href="registrarSala.php?id_sala=1" class="action-link update-link btn btn-warning">Actualizar</a>
                <a href="eliminarSala.php?id=1" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sala de Seguridad Informática</td>
            <td>
                <a href="registrarSala.php?id_sala=2" class="action-link update-link btn btn-warning">Actualizar</a>
                <a href="eliminarSala.php?id=2" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sala de Desarrollo Ágil</td>
            <td>
                <a href="registrarSala.php?id_sala=3" class="action-link update-link btn btn-warning">Actualizar</a>
                <a href="eliminarSala.php?id=3" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        </tbody>
    </table>  -->
    <!-- Nueva tabla con DataTables -->
    <table id="tablaSalas" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Sala</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Disponibilidad</th>
            <th>Ubicación</th>
            <th>Capacidad</th>
            <th>Acciones</th>
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
    //Funcion para darte estilo al dataTable
    const dataTableOptions = {
        lengthMenu: [10, 20, 50, 100],
        columnDefs:[
            {className: "centered", targets: [0,1,2,3,4,5,6,7]},
            {orderable: false, targets: [7]},
            {width: "5%", targets: [0,6]},
            {width: "20%", targets: [7]},
            {searchable: true, targets: [0,1,2,3,4,5,6] }
        ],
        pageLength:10,
        destroy: true,
        language:{
            lengthMenu: "Mostrar _MENU_ registros pór página",
            sZeroRecords: "Ninguna sala encontrada",
            info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Ninguna sala encontrada",
            infoFiltered: "(filtrados desde _MAX_ registros totales)",
            search: "Buscar: ",
            loadingRecords: "Cargando...",
            paginate:{
                first:"Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    };


    $(document).ready(function() {
        $('#tablaSalas').DataTable({
            ...dataTableOptions,
        "ajax": {
            "url": "daoCargarDatosSala.php", 
            "dataSrc": function (json) {
                console.log(json); // Verificar el JSON en consola TEST 
                if (json.error) {
                    console.error(json.error);
                    return [];
                }
                return json.data.map(function (sala) {
                    return {
                        "ID Sala": sala.espacioID,
                        "Nombre de la Sala": sala.nombreEspacio,
                        "Descripción": sala.descripcion,
                        "Tipo de Sala": sala.tipoEspacio,
                        "Disponibilidad": sala.disponibilidad ? 'Sí' : 'No',
                        "Ubicación": sala.ubicacion,
                        "Capacidad": sala.capacidad,
                        "Acciones": `
                            <a href="registrarSala.php?id_sala=${sala.espacioId}" class="action-link update-link btn btn-warning">Actualizar</a>
                            <a href="eliminarSala.php?id=${sala.espacioId}" class="btn btn-danger">Eliminar</a>
                        `
                    };
                });
            }
        },
        "columns": [
            { "data": "ID Sala" },
            { "data": "Nombre de la Sala" },
            { "data": "Descripción" },
            { "data": "Tipo de Sala" },
            { "data": "Disponibilidad" },
            { "data": "Ubicación" },
            { "data": "Capacidad" },
            { "data": "Acciones" }
        ]
    });
});


</script>

</body>
</html>
