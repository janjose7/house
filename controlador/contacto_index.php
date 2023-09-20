<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once "config.php";

$mail = new PHPMailer(true);

    $correo_cli = trim(htmlentities(addslashes(isset($_POST['correo'])))) ? $_POST['correo'] : '';
    $correo_cli = strtolower($correo_cli);
    $nombre = trim(htmlentities(addslashes(isset($_POST['nombre'])))) ? $_POST['nombre'] : '';
    $nombre = ucwords($nombre);
    $telefono = trim(htmlentities(addslashes(isset($_POST['tlf'])))) ? $_POST['tlf'] : '';
    $mensaje = trim(htmlentities(addslashes(isset($_POST['sms'])))) ? $_POST['sms'] : '';

try{
    require_once 'correo_mailer.php';

    $mail->addAddress($correo_cli, $nombre);
    $mail->addReplyTo(CorreoReply,"Responder a");

    $mail->Subject = '¡Contacto con OxeRev!';

    $cargar = file_get_contents('contactoIndex.html');
    $cargar = str_replace('%nombre%', $nombre, $cargar);
    $cargar = str_replace('%email%', $correo_cli, $cargar);
    $cargar = str_replace('%cel%', $telefono, $cargar);
    $cargar = str_replace('%sms%', $mensaje, $cargar);
    $cargar = str_replace('%hora%', $hr, $cargar);
    $mail->msgHTML($cargar, __DIR__ );
    $mail->AltBody = '  <h1>Contacto con OxeRev</h1>
                        <h2>¡Hola!</h2>
                        <p>¡Se ha enviado el correo de contacto con exito! En la brevedad posible recibirá una respuesta oportuna a su solicitud o inquietud</p>
                        <hr>
                        <p>Nombres: ' . $nombre . '</p>
                        <p>Correo: ' . $correo_cli . '</p>
                        <p>Celular: ' . $telefono . '</p>
                        <p>Mensaje: ' . $mensaje . '</p>
                        <hr>
                        <p>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                        <p>' . $hr . '</p>
                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

    if(!$mail->send()) {
        echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en Mailer{contacto_index[C01]}: " . $mail->ErrorInfo . "</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
    } else {
        echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Mensaje enviado con exito!<i class='fa-solid fa-paper-plane'></i>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
    }
} catch (Exception $e){
    echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Ha ocurrido un error en Mailer {contacto_index[C02]}: " . $mail->ErrorInfo . "</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
}

?>