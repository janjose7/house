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


$asunto = trim(htmlentities(addslashes($_POST['dev_contacto']))) ? $_POST['dev_contacto'] : '';
$contenido = trim(htmlentities(addslashes($_POST['dev_comentario']))) ? $_POST['dev_comentario'] : '';
$nombre_cli = $_SESSION['rev_conectado'];
$correo_cli = $_SESSION['rev_correo'];
$vivienda_cli = $_SESSION['rev_vivienda'];

$residenciaResi = $_SESSION['residencia_cli'];
$nombreResi = $_SESSION['nombreR_cli'];
$rifResi = $_SESSION['rif_cli'];
$direccionResi = $_SESSION['direccion_cli'];

try{
    require_once 'correo_mailer.php';

    $mail->addAddress(CorreoOxe, 'Contacto Interno'); // Correo de Oxerev
    $mail->addAddress(CorreoDev, 'Contacto Interno'); // Correo de Dev

    $mail->Subject = '¡Ayuda - Contacto!';

    $cargar = file_get_contents('ayuda_dev.html');
    $cargar = str_replace('%asunto%', $asunto, $cargar);
    $cargar = str_replace('%contenido%', $contenido, $cargar);
    $cargar = str_replace('%nombre%', $nombre_cli, $cargar);
    $cargar = str_replace('%correo%', $correo_cli, $cargar);
    $cargar = str_replace('%vivienda%', $vivienda_cli, $cargar);
    $cargar = str_replace('%residencia_con%', $residenciaResi, $cargar);
    $cargar = str_replace('%nombre_con%', $nombreResi, $cargar);
    $cargar = str_replace('%rif%', $rifResi, $cargar);
    $cargar = str_replace('%direccion%', $direccionResi, $cargar);
    $cargar = str_replace('%hora%', $hr, $cargar);
    $mail->msgHTML($cargar, __DIR__ );
    $mail->AltBody = '  <h1>Ayuda - Contacto</h1>
                        <p><strong>Asunto</strong>: ' . $asunto . '</p>
                        <p><strong>Contenido</strong>: ' . $contenido . '.</p>
                        <br>
                        <h3>Datos del Usuario:</h3>
                        <ul>
                            <li><strong>Nombre</strong>: ' . $nombre_cli . '</li>
                            <li><strong>Correo</strong>: ' . $correo_cli . '</li>
                            <li><strong>Vivienda</strong>: '. $vivienda_cli . '</li>
                            <li><strong>    </strong>: ' . $hr . '</li>
                        </ul>
                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

    if (!$mail->send()) {
        echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        unset($_SESSION['residencia_cli']);
        unset($_SESSION['nombreR_cli']);
        unset($_SESSION['rif_cli']);
        unset($_SESSION['direccion_cli']);
    } else {
        echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Correo enviado!&nbsp;<i class='fa-solid fa-paper-plane'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        unset($_SESSION['residencia_cli']);
        unset($_SESSION['nombreR_cli']);
        unset($_SESSION['rif_cli']);
        unset($_SESSION['direccion_cli']);
    }
} catch (Exception $e){
    echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
}

?>