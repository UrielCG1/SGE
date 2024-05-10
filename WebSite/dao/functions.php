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

function enviarEmail($email, $nombre,$asunto,$cuerpo)
{
    require_once '../../PHPMailer/PHPMailerAutoload.php';






    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';


    $mail= new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 3306;
    $mail->SMTPAuth = true;
    $mail->Username = 'sge.tecnm@gmail.com'; //Correo de quien envia el email
    $mail->Password = 'sge2024s';
    $mail->SMTPSecure = 'ssl';
    $mail->setFrom('sge.tecnm@gmail.com', 'Sistema de Gestión de Espacios');
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