<?php
include_once('../dao/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSala = $_POST["id_sala"];

    eliminarSala($idSala);
} else {
    echo json_encode(array('error' => true, 'message' => 'Se esperaba una solicitud POST.'));
}

function eliminarSala($id_sala) {
    $con = new LocalConector();
    $conex = $con->conectar();

    $stmt1 = null;
    $stmt2 = null;

    $errors = []; 

    try {
        // Elimina de la tabla `evaluacion_espacio`
        $stmt1 = $conex->prepare("DELETE FROM evaluacion_espacio WHERE espacioID_key = ?");
        $stmt1->bind_param("i", $id_sala);
        $stmt1->execute();

        // Elimina de la tabla `espacios`
        $stmt2 = $conex->prepare("DELETE FROM espacios WHERE espacioID = ?");
        $stmt2->bind_param("i", $id_sala);
        $stmt2->execute();

        $success = $stmt1->affected_rows > 0 || $stmt2->affected_rows > 0;

        if ($success) {
            $conex->commit();
        }

        if ($stmt1) $stmt1->close();
        if ($stmt2) $stmt2->close();

        $conex->close();

        if ($success) {
            echo json_encode(["error" => false, "message" => "Sala eliminada exitosamente"]);
        } else {
            echo json_encode(["error" => true, "message" => implode(", ", $errors)]);
        }
    } catch (Exception $e) {
        $conex->rollback();

        if ($stmt1) $stmt1->close();
        if ($stmt2) $stmt2->close();

        $conex->close();

        echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
}

if (isset($_POST['id_sala'])) {
    eliminarSala($_POST['id_sala']);
} else {
    echo json_encode(["error" => true, "message" => "ID de sala no proporcionado"]);
}
?>
