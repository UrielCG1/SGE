<?php
header('Content-Type: application/json');

// Simulación de datos, en la práctica esto vendría de una base de datos
$data = [
    ["ID Sala" => 1, "Nombre de la Sala" => "Sala A", "Disponibilidad" => "Sí"],
    ["ID Sala" => 2, "Nombre de la Sala" => "Sala B", "Disponibilidad" => "No"],
    // Más datos...
];

echo json_encode(['data' => $data]);
?>
