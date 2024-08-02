<?php

/*$mail_to=(isset($_REQUEST['mail_to']) && $_REQUEST['mail_to']!=null) ? $_REQUEST['mail_to'] : '';
$subject=(isset($_REQUEST['subject']) && $_REQUEST['subject']!=null) ? $_REQUEST['subject'] : '';
$message=(isset($_REQUEST['message']) && $_REQUEST['message']!=null) ? $_REQUEST['message'] : '';
$headers=(isset($_REQUEST['headers']) && $_REQUEST['headers']!=null) ? $_REQUEST['headers'] : '';
$parameters=(isset($_REQUEST['parameters']) && $_REQUEST['parameters']!=null) ? $_REQUEST['parameters'] : '';
*/
//librerias
//https://getcomposer.org/doc/01-basic-usage.md
//https://programacionconphp.com/enviar-email-php-2022/
include_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
include_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
include_once('../vendor/phpmailer/phpmailer/src/Exception.php');


//Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
 
//Configuracion servidor mail
$mail->From = "developer.jonathanc@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 465; //puerto
$mail->Username ='developer.jonathanc@gmail.com'; //nombre usuario
$mail->Password = 'Developer12/'; //contraseña
 
//Agregar destinatario
$mail->AddAddress('jcastillo@xxi-banorte.com');
$mail->Subject = 'Subject';
$mail->Body = 'PRUEBA DE ENVIO';
 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Enviado Correctamente");
        </script>';
} else {
    echo "HOLA";
}

?>