<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER; EZSX9JVHV6A6LBHHZ5NEAZS9 twilio

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.mailersend.net";
$mail->Port = 587;
$mail->Username = "MS_z9kHOH@trial-k68zxl2179m4j905.mlsender.net";
$mail->Password = "rT8vIUlyDl14YBr4";

$mail->isHtml(true);

return $mail;