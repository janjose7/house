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

$op = trim(htmlentities(addslashes($_SESSION['op_extra'])));

if($op == 'alquiler'){

    $status = 'Rechazado';
    $id_alquiler = trim(htmlentities(addslashes($_SESSION['id_alquiler'])));
    $id_delete =  trim(htmlentities(addslashes($_SESSION['id_extra'])));
    $correo_user = trim(htmlentities(addslashes($_POST['correo_user'])));
    $sms_motivo = trim(htmlentities(addslashes($_POST['sms_motivo']))) ? $_POST['sms_motivo'] : 'Datos erroneos a la hora de validar su operación, por favor reenvíe los datos nuevamente haciendo la misma acción para ser procesador';

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    $resultado = $conn->prepare("UPDATE alquiler_scs6_oxerev SET status_scs6_rev = :status WHERE id_ref_scs6_rev = '$id_alquiler'");
    $resultado->execute(array(":status" => ucfirst($status)));

    $result = $conn->prepare("UPDATE pagos_alquiler_scs10_oxerev SET view_scs10_rev = 2 WHERE id_ref_scs10_rev  = '$id_delete'");
    $result->execute();

    try{
        $mail->addAddress($correo_user, 'Operación Declinada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%id%', $id_alquiler, $cargar);
        $cargar = str_replace('%motivo%', $sms_motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id_alquiler . '</li>
                                <li><strong>Motivo</strong>: ' . $sms_motivo . '.</li>
                            </ul>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud de Reenvío Exitosa!</strong>, espere los nuevos datos</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "inicio.php";history.forward();history.pushState(null, "", "inicio.php");},1000);</script>';
            unset($_SESSION['op_extra']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['id_alquiler']);
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

} elseif($op == 'residencia'){
    $correo_user = trim(htmlentities(addslashes($_POST['correo_user'])));
    $id_kresidencia = trim(htmlentities(addslashes($_SESSION['id_kresidencia'])));
    $id_delete =  trim(htmlentities(addslashes($_POST['id'])));
    $motivo = 'Datos erroneos a la hora de validar su operación, por favor reenvíe los datos nuevamente haciendo la misma acción para ser procesador';

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    $sql = $conn->prepare("SELECT * FROM kresidencia_scs7_oxerev WHERE id_ref_scs7_rev = '$id_kresidencia'");
    $sql->execute();
    $recibo = $sql->fetch(PDO::FETCH_OBJ);

    $result0 = $conn->prepare("UPDATE kresidencia_scs7_oxerev SET view_scs7_rev = 2 WHERE id_ref_scs7_rev  = '$id_kresidencia'");
    $result0->execute();

    $result = $conn->prepare("UPDATE pagos_kresidencia_scs11_oxerev SET view_scs11_rev = 2 WHERE id_ref_scs11_rev  = '$id_delete'");
    $result->execute();

    try{
        $mail->addAddress($correo_user, 'Operación Declinada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%id%', $id_kresidencia, $cargar);
        $cargar = str_replace('%motivo%', $motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id_kresidencia . '</li>
                                <li><strong>Motivo</strong>: ' . $motivo . '.</li>
                            </ul>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud de Reenvío Exitosa!</strong>, espere los nuevos datos</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "inicio.php";history.forward();history.pushState(null, "", "inicio.php");},1000);</script>';
            unset($_SESSION['op_extra']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['id_kresidencia']);
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }


} elseif($op == 'mudanza'){
    $id_mudanza = trim(htmlentities(addslashes($_SESSION['id_mudanza'])));
    $correo_user = trim(htmlentities(addslashes($_POST['correo_user'])));
    $motivo = trim(htmlentities(addslashes($_POST['sms_motivo']))) ? $_POST['sms_motivo'] : 'Datos erroneos a la hora de validar su operación, por favor reenvíe los datos nuevamente haciendo la misma acción para ser procesador';
    $status = 'Rechazado';

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    $sql = $conn->prepare("UPDATE mudanza_scs9_oxerev SET status_scs9_rev = :status WHERE id_ref_scs9_rev = '$id_mudanza'");
    $sql->execute(array(":status" => ucfirst($status)));

    try{
        $mail->addAddress($correo_user, 'Operación Declinada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%id%', $id_mudanza, $cargar);
        $cargar = str_replace('%motivo%', $motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id_mudanza . '</li>
                                <li><strong>Motivo</strong>: ' . $motivo . '.</li>
                            </ul>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud Rechazada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "inicio.php";history.forward();history.pushState(null, "", "inicio.php");},1500);</script>';

            unset($_SESSION['id_mudanza']);
            unset($_SESSION['op_extra']);
            unset($_SESSION['id_extra']);
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

} elseif($op == 'solvencia'){
    $id_solvencia = trim(htmlentities(addslashes($_SESSION['id_solvencia'])));
    $correo_user = trim(htmlentities(addslashes($_POST['correo_user'])));
    $motivo = trim(htmlentities(addslashes($_POST['sms_motivo']))) ? $_POST['sms_motivo'] : 'Datos erroneos a la hora de validar su operación, por favor reenvíe los datos nuevamente haciendo la misma acción para ser procesador';
    $status = 'Rechazado';

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    $sql2 = $conn->prepare("SELECT * FROM solvencia_scs8_oxerev WHERE id_ref_scs8_rev = '$id_solvencia'");
    $sql2->execute();
    $show = $sql2->fetch(PDO::FETCH_OBJ);

    $result = $conn->prepare("UPDATE solvencia_scs8_oxerev SET view_scs8_rev = 2, status_scs8_rev = :status WHERE id_ref_scs8_rev  = '$id_solvencia'");
    $result->execute(array(":status" => ucfirst($status)));

    try{
        $mail->addAddress($correo_user, 'Operación Declinada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Declinada!';
        $cargar = file_get_contents('validar_rechazo.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%id%', $id_solvencia, $cargar);
        $cargar = str_replace('%motivo%', $motivo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Declinada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha negado su operación el dia ' . $hr . ' por datos erroneos, por favor realice un reenvío de datos lo antes posible.</p>
                            <br>
                            <ul>
                                <li><strong>Operación</strong>: ' . $id_solvencia . '</li>
                                <li><strong>Motivo</strong>: ' . $motivo . '.</li>
                            </ul>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud Rechazada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "inicio.php";history.forward();history.pushState(null, "", "inicio.php");},1500);</script>';

            unset($_SESSION['id_solvencia']);
            unset($_SESSION['op_extra']);
            unset($_SESSION['id_extra']);
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

} else {
    echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Error {solicitud_rechazo[C01]}</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000)';
}

?>