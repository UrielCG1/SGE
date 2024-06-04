<?php
include_once('../dao/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $idSala = $_POST["id_sala"];
    $nombreEspacio = $_POST["nombreEspacio"];
    $descripcion = $_POST["descripcion"];
    $tipoEspacio = $_POST["tipoEspacio"];
    $disponibilidad = $_POST["disponibilidad"];
    $ubicacion = $_POST["ubicacion"];
    $capacidad = $_POST["capacidad"];

    actualizarSala($nombreEspacio, $descripcion, $tipoEspacio, $disponibilidad, $ubicacion,$capacidad,$idSala);
} else {
    // Si no se recibe una solicitud POST, mostrar un mensaje de error
    echo "Error: Se esperaba una solicitud POST.";
}
function actualizarSala($nombreEspacio, $descripcion, $tipoEspacio, $disponibilidad, $ubicacion,$capacidad,$idSala){
    $con = new LocalConector();
    $conex = $con->conectar();

    $insertMaterial = $conex->prepare("UPDATE espacios 
                                                SET nombreEspacio = ?, descripcion= ?, tipoEspacio= ?, disponibilidad= ?, ubicacion= ?, capacidad= ?
                                             WHERE espacioId = ?");
    $insertMaterial->bind_param("sssisii", $nombreEspacio, $descripcion, $tipoEspacio, $disponibilidad, $ubicacion,$capacidad,$idSala);
    $resultado = $insertMaterial->execute();

    $conex->close();

    if (!$resultado) {
        echo "Los datos no se insertaron correctamente.";
        echo json_encode(array('error' => true));
    } else {
        echo json_encode(array('error' => false));
    }
    exit;
}
?>