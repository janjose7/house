<?php

session_start();

date_default_timezone_set('America/Caracas');

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$asunto = trim(htmlentities(addslashes($_POST['issue']))) ? $_POST['issue'] : '';
$contenido = trim(htmlentities(addslashes($_POST['sms_comentario'])));
$nombre_cli = $_SESSION['rev_conectado'];
$correo_cli = $_SESSION['rev_correo'];


try{
    require_once 'correo_mailer.php';

    $mail->addAddress(CorreoOxe, 'Adquirir Servicios'); // Correo de Oxerev
    $mail->addReplyTo(CorreoOxe,"Responder a"); // Correo para que el usuario responda

    $mail->Subject = '¡Adquirir Servicios!';

    $cargar = file_get_contents('adquirir.html');
    $cargar = str_replace('%asunto%', $asunto, $cargar);
    $cargar = str_replace('%contenido%', $contenido, $cargar);
    $cargar = str_replace('%nombre%', $nombre_cli, $cargar);
    $cargar = str_replace('%correo%', $correo_cli, $cargar);
    $cargar = str_replace('%hora%', $hr, $cargar);
    $mail->msgHTML($cargar, __DIR__ );
    $mail->AltBody = '  <h1>¡Adquirir Servicios!</h1>
                        <p>Hola, soy ' . $nombre_cli . '.</p>
                        <p><strong>Asunto</strong>: ' . $asunto . '<br>
                        <strong>Contenido</strong>: ' . $contenido . '.</p>
                        <br>
                        <h3>Datos del Usuario:</h3>
                        <ul>
                            <li><strong>Nombre</strong>: ' . $nombre_cli . '</li>
                            <li><strong>Correo</strong>: ' . $correo_cli . '</li>
                            <li><strong>    </strong>: ' . $hr . '</li>
                        </ul>
                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';
    if($contenido == ''){
        echo "<div class='alert alert-warning' role='alert' id='alertaCerrar'>No se puede enviar sin contenido</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
    } else{
        if (!$mail->send()) {
        echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Correo enviado!&nbsp;<i class='fa-solid fa-paper-plane'></i></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        }
    }
} catch (Exception $e){
    echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
}

?>