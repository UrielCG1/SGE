<?php

// Verificar si el índice "email" está presente en $_POST
if (!isset($_POST["email"])) {
    echo "El campo de correo electrónico es requerido.";
    exit;
}

$email = $_POST["email"];

// Generar el token y sus hashes
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Obtener la conexión a la base de datos
$mysqli = require __DIR__ . "/config.php";

// Verificar si la conexión a la base de datos es válida
if (!$mysqli || $mysqli->connect_error) {
    echo "Error de conexión a la base de datos.";
    exit;
}

// Preparar y ejecutar la consulta SQL
$sql = "UPDATE usuarios
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    echo "Error al preparar la declaración.";
    exit;
}

$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($stmt->affected_rows) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("MS_z9kHOH@trial-k68zxl2179m4j905.mlsender.net");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    Click <a href="http://localhost/WebSite/reset-password.php?token=$token">here</a> 
    to reset your password.
    END;

    try {
        $mail->send();
        echo "Message sent, please check your inbox.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
} else {
    echo "No se encontró ningún usuario con ese correo electrónico.";
}

$stmt->close();
$mysqli->close();
?>
