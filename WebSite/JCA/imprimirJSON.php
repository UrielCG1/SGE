<?php
    // Establecer la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "db_test");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Realizar la consulta para obtener el campo deseado
    $sql = "SELECT espacioID_key, comentarios FROM evaluacion_espacio";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // Mostrar el contenido de todos los comentarios en formato HTML
        echo '<div>';
        echo '<h1>Reseñas de Usuarios</h1>';
        while ($fila = $resultado->fetch_assoc()) {
            // Convertir el campo comentarios a un objeto JSON si es necesario
            $tipo_dato = gettype($fila["comentarios"]);
            if ($tipo_dato === "string") {
                $comentarios_json = $fila["comentarios"];
                $comentarios_array = json_decode($comentarios_json, true);

                if (is_array($comentarios_array)) {
                    echo '<div style="margin-bottom: 20px;">';
                    echo '<div><strong>SALA ID:</strong> ' . $fila["espacioID_key"] . '</div>';
                    echo '<ul>';
                    foreach ($comentarios_array as $comentario) {
                        echo '<li>';
                        echo '<strong>' . $comentario['cliente'] . ':</strong> ' . $comentario['comentario'];
                        echo '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo "El campo 'comentarios' del espacio ID " . $fila["espacioID_key"] . " no es un array JSON válido.";
                }
            } else {
                //echo "El campo 'comentarios' del espacio ID " . $fila["espacioID_key"] . " ya es un objeto JSON.";
            }
        }
        echo '</div>';
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión
    $conexion->close();
?>