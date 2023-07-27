<?php

$mail_to=(isset($_REQUEST['mail_to']) && $_REQUEST['mail_to']!=null) ? $_REQUEST['mail_to'] : '';
$subject=(isset($_REQUEST['subject']) && $_REQUEST['subject']!=null) ? $_REQUEST['subject'] : '';
$message=(isset($_REQUEST['message']) && $_REQUEST['message']!=null) ? $_REQUEST['message'] : '';
$headers=(isset($_REQUEST['headers']) && $_REQUEST['headers']!=null) ? $_REQUEST['headers'] : '';
$parameters=(isset($_REQUEST['parameters']) && $_REQUEST['parameters']!=null) ? $_REQUEST['parameters'] : '';

$to = "pur_gatory@hotmail.com";
$subject = "Asunto del email";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = "
<html>
<head>
<title>HTML</title>
</head>
<body>
<h1>Esto es un H1</h1>
<p>Esto es un párrafo en HTML</p>
</body>
</html>";
 
mail($to, $subject, $message, $headers);
?>