<?php

define('CorreoDev', 'oxerev@proton.me');
define('Host', 'smtp.gmail.com');
define('UsuarioMailer', 'oxerev.sol@gmail.com');
define('PassW', 'yxjaqrenrtpuckvc');
define('CorreoOxe', 'oxerev.sol@gmail.com');
define('CorreoReply', 'contacto.oxe@gmail.com');
define('CorreoCondonimio', 'janjoseg@gmail.com');

$timezone  = -4;
$hr = gmdate("j/m/Y", time() + 3600*($timezone+date("I")));
// $hr = gmdate("j/m/Y H:i:s", time() + 3600*($timezone+date("I")));

$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = Host;
$mail->SMTPAuth = true;
$mail->Username = UsuarioMailer;
$mail->Password = PassW;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
//defino el email y nombre del remitente del mensaje
$mail->setFrom(CorreoOxe, 'OxeRev');
$mail->FromName = "OxeRev"; //Remitente
$mail->isHTML(true);
$mail->CharSet = "UTF-8";
$mail->Encoding = 'base64';
$mail->setLanguage('es', 'PHPMailer/phpmailer.lang-es.php');

?>

