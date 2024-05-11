<?php
function hasPassword($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

function generateToken()
{
    $gen = md5(uniqid(mt_rand(),false));
    return $gen;
}

use PHPMailer\dao\Phpmailer\Exception;
use PHPMailer\dao\Phpmailer\PHPMailer;
use PHPMailer\dao\Phpmailer\SMTP;

function enviarEmail($email, $nombre,$asunto,$cuerpo)
{
    require_once 'Phpmailer/Exception.php';
    require_once 'Phpmailer/PHPMailer.php';
    require_once 'Phpmailer/SMTP.php';

    $mail= new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'LaboratorioMetrologiaGrammer@arketipo.mx'; //Correo de quien envia el email
    $mail->Password = 'LMGrammer2024#';
    $mail->SMTPSecure = 'ssl';
    $mail->setFrom('LaboratorioMetrologiaGrammer@arketipo.mx', 'Sistema de Gestión de Espacios');
    $mail->CharSet = 'UTF-8';

    //Solicitante
    $mail->addAddress($email, $nombre); //Quién recibirá correo
    $mail->addBCC('aleiram.rcamo@gmail.com', 'TI');

    $mail->Subject = $asunto;
    $mail->isHTML(true);
    $mail->Body = $cuerpo;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

}

function validaToken($id, $token)
{
    global $mysqli;

    $stmt = $mysqli ->prepare ("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
    $stmt->bind_param("is", $id, $token);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    $activacion = null;

    if($rows > 0){
        $stmt->bind_result($activacion);
        $stmt->fetch();

        if($activacion == 1){
            $msg = "La cuenta ya se activo anteriormente.";
        }else{
            if(activarUsuario($id)){
                $msg = 'Cuenta activada.';
            }else{
                $msg = "Error al activar cuenta.";
            }
        }
    }
}

function activarUsuario($id)
{
    global $mysqli;

    $stmt = $mysqli ->prepare ("UPDATE usuarios SET activacion=1 WHERE id= ?");
    $stmt->bind_param("s", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}