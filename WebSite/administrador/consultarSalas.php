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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Panel de Administrador | Gestionar Salas</h1>
    <div class="text-right mb-3">
        <a href="registrarSala.php" class="btn btn-primary">Crear Sala</a>
    </div>
    <table id="tablaSalas" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
        <tr>
            <th class="centrado">No.</th>
            <th class="centrado">Sala</th>
            <th class="centrado">Descripción</th>
            <th class="centrado">Tipo</th>
            <th class="centrado">Disponibilidad</th>
            <th class="centrado">Ubicación</th>
            <th class="centrado">Capacidad</th>
            <th class="centrado">Acciones</th>
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
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const dataTableOptions = {
        lengthMenu: [10, 20, 50, 100],
        columnDefs: [
            { className: "centrado", targets: [0, 1, 2, 3, 4, 5, 6, 7] },
            { orderable: false, targets: [7] },
            { width: "5%", targets: [0, 6] },
            { width: "20%", targets: [7] },
            { searchable: true, targets: [0, 1, 2, 3, 4, 5, 6] }
        ],
        pageLength: 10,
        destroy: true,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            sZeroRecords: "Ninguna sala encontrada",
            info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Ninguna sala encontrada",
            infoFiltered: "(filtrados desde _MAX_ registros totales)",
            search: "Buscar: ",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    };

    $(document).ready(function () {
        const table = $('#tablaSalas').DataTable({
            ...dataTableOptions,
            ajax: {
                url: "daoCargarDatosSala.php",
                dataSrc: function (json) {
                    console.log(json);
                    if (json.error) {
                        console.error(json.error);
                        return [];
                    }
                    return json.data.map(function (sala) {
                        return {
                            "ID Sala": sala.espacioId,
                            "Nombre de la Sala": sala.nombreEspacio,
                            "Descripción": sala.descripcion,
                            "Tipo de Sala": sala.tipoEspacio,
                            "Disponibilidad": sala.disponibilidad ? 'Sí' : 'No',
                            "Ubicación": sala.ubicacion,
                            "Capacidad": sala.capacidad,
                            "Acciones": `
                                <a href="registrarSala.php?id_sala=${sala.espacioId}" class="action-link update-link btn btn-warning btnSalas">Actualizar</a>
                                <button class="btn btn-danger btnSalas" onclick="eliminarSala(${sala.espacioId})">Eliminar</button>
                            `
                        };
                    });
                }
            },
            columns: [
                { data: "ID Sala" },
                { data: "Nombre de la Sala" },
                { data: "Descripción" },
                { data: "Tipo de Sala" },
                { data: "Disponibilidad" },
                { data: "Ubicación" },
                { data: "Capacidad" },
                { data: "Acciones" }
            ]
        });
        window.eliminarSala = function(id_sala) {
        console.log(`Intentando eliminar sala con ID: ${id_sala}`);
        if (!id_sala) {
            Swal.fire({
                title: "Error",
                text: "No se puede eliminar una sala sin un ID válido.",
                icon: "error"
            });
            return;
        }

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarla'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(`Confirmado, eliminando sala con ID: ${id_sala}`);
                const data = new FormData();
                data.append('id_sala', id_sala);

                fetch('daoEliminarSala.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor.');
                    }
                    return response.json();
                })
                .then(responseData => {
                    console.log('Aquí no entra jaja', responseData); 
                    // xd
                })
                .catch(err => {
                    console.log(`Confirmado, eliminando sala con ID: ${id_sala}`);
                    const data = new FormData();
                    data.append('id_sala', id_sala);

                    fetch('daoEliminarSala.php', {
                        method: 'POST',
                        body: data
                    })
                    
                    
                    Swal.fire({
                        title: "¡Sala eliminada exitosamente!",
                        icon: "success"
                    }).then(() => {
                        table.ajax.reload(); // Recargar la tabla
                    });
                        
                });
            }
        });
    }
});
</script>
</body>
</html>
