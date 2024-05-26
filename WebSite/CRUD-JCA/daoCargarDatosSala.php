<?php

include_once('../dao/connection.php');

if (isset($_GET['id_sala']) && is_numeric($_GET['id_sala'])) {
    $id_sala = intval($_GET['id_sala']);
    resumenSala($id_sala);
} else {
    echo json_encode(array("error" => "Parámetro inválido"));
    exit;
}

function resumenSala($id_sala){
    $con = new LocalConector();
    $conex = $con->conectar();

    if ($conex->connect_error) {
        echo json_encode(array("error" => "Error de conexión: " . $conex->connect_error));
        exit;
    }

    $stmt = $conex->prepare("SELECT * FROM `espacios` WHERE espacioId = ?");
    if (!$stmt) {
        echo json_encode(array("error" => "Error en la preparación de la consulta: " . $conex->error));
        exit;
    }

    $stmt->bind_param("i", $id_sala);
    if (!$stmt->execute()) {
        echo json_encode(array("error" => "Error en la ejecución de la consulta: " . $stmt->error));
        exit;
    }

    $result = $stmt->get_result();
    $resultado = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode(array("data" => $resultado));

    $stmt->close();
    $conex->close();
}

?>
