<?php
header('Content-Type: application/json');

// Simulación de datos, en la práctica esto vendría de una base de datos
$data = [
    ["ID Sala" => 1, "Nombre de la Sala" => "Sala A", "Ubicación" => "Edificio 1, Planta Baja"],
    ["ID Sala" => 2, "Nombre de la Sala" => "Sala B", "Ubicación" => "Edificio 2, Planta Alta"],
    // Más datos...
];

echo json_encode(['data' => $data]);
?>
