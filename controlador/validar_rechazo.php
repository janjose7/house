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
require_once 'config.php';

$mail = new PHPMailer(true);
$instancia_conn = new Conexion();
$conn = $instancia_conn->Conectar();

include 'correo_mailer.php';

$op = trim(htmlentities(addslashes($_SESSION['pago'])));


if($op == 'pago_cuota'){

    $id = trim(htmlentities(addslashes($_POST['id'])));
    $nom = trim(htmlentities(addslashes($_POST['nom'])));
    $ref = trim(htmlentities(addslashes($_POST['ref'])));
    $sms_motivo = trim(htmlentities(addslashes($_POST['sms_motivo']))) ? $_POST['sms_motivo'] : 'Datos Errados';
    $ema = trim(htmlentities(addslashes($_POST['ema'])));

    $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 2 WHERE id_ref_scs1_rev = '$id'");
    $resultado->execute();

    try{
    
        $mail->addAddress($ema, 'Operación Declinada'); // Correo de Oxerev
        $mail->addReplyTo(CorreoCondonimio,"Responder a"); // Correo para que el usuario responda
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nom, $cargar);
        $cargar = str_replace('%id%', $id, $cargar);
        $cargar = str_replace('%motivo%', $sms_motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nom . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id . '</li>
                                <li><strong>Motivo</strong>: ' . $sms_motivo . '</li>
                            </ul>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
    
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Correo enviado!&nbsp;<i class='fa-solid fa-paper-plane'></i></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'procesar.php';history.forward();history.pushState(null, '', 'procesar.php');},1000);</script>";
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

    unset($_POST['id']);
    unset($_POST['nom']);
    unset($_POST['ref']);
    unset($_POST['sms_motivo']);
    unset($_POST['ema']);
    unset($_SESSION['pago']);
    unset($_SESSION['id_extra']);
    $conn = null;

} elseif($op == 'pago_extra'){

    $id = trim(htmlentities(addslashes($_POST['id'])));
    $nom = trim(htmlentities(addslashes($_POST['nom'])));
    $ref = trim(htmlentities(addslashes($_POST['ref'])));
    $sms_motivo = trim(htmlentities(addslashes($_POST['sms_motivo']))) ? $_POST['sms_motivo'] : 'Datos Errados';
    $ema = trim(htmlentities(addslashes($_POST['ema'])));


    $resultado = $conn->prepare("UPDATE extraordinario_scs2_oxerev SET view_scs2_rev = 2 WHERE id_ref_scs2_rev = '$id'");
    $resultado->execute();

    try{
    
        $mail->addAddress($ema, 'Operación Declinada'); // Correo de Oxerev
        $mail->addReplyTo(CorreoReply,"Responder a"); // Correo para que el usuario responda
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nom, $cargar);
        $cargar = str_replace('%id%', $id, $cargar);
        $cargar = str_replace('%motivo%', $sms_motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nom . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id . '</li>
                                <li><strong>Motivo</strong>: ' . $sms_motivo . '</li>
                            </ul>
                            <p>OxeRev © 2023 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
    
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Correo enviado!&nbsp;<i class='fa-solid fa-paper-plane'></i></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'extraordinario.php';history.forward();history.pushState(null, '', 'extraordinario.php');},1000);</script>";
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

    unset($_POST['id']);
    unset($_POST['nom']);
    unset($_POST['ref']);
    unset($_POST['sms_motivo']);
    unset($_POST['ema']);
    unset($_SESSION['pago']);
    unset($_SESSION['id_extra']);
    $conn = null;

} else {
    echo "<div class='alert alert-danger' role='alert'><strong>Error {validar_rechazo[102]}</strong>Ha ocurrido un error inesperado</div>";
}
?>
