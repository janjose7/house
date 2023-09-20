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

    $status = 'Aprobado';
    $id_alquiler = trim(htmlentities(addslashes($_SESSION['id_alquiler'])));
    $id_delete =  trim(htmlentities(addslashes($_SESSION['id_extra'])));

    $resultado = $conn->prepare("UPDATE alquiler_scs6_oxerev SET status_scs6_rev = :status WHERE id_ref_scs6_rev = '$id_alquiler'");
    $resultado->execute(array(":status" => ucfirst($status)));

    $result = $conn->prepare("UPDATE pagos_alquiler_scs10_oxerev SET view_scs10_rev = 0 WHERE id_ref_scs10_rev  = '$id_delete'");
    $result->execute();

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    try{
        $mail->addAddress($correo_user, 'Operación Aprobada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Aprobada!';
        $cargar = file_get_contents('aprobado.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Aprobada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha aprobado su operación el dia ' . $hr . ', podrá visualizar el comprobante y recibo mediante la plataforma..</p>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Fecha Reservada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "solicitud.php";history.forward();history.pushState(null, "", "solicitud.php");},1000);</script>';

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
    $fecha = date('Y-m-d');

    $result0 = $conn->prepare("UPDATE kresidencia_scs7_oxerev SET view_scs7_rev = 0, fecha_scs7_rev = :fecha_nueva WHERE id_ref_scs7_rev  = '$id_kresidencia'");
    $result0->execute(array(":fecha_nueva" => $fecha));

    $result = $conn->prepare("UPDATE pagos_kresidencia_scs11_oxerev SET view_scs11_rev = 0 WHERE id_ref_scs11_rev  = '$id_delete'");
    $result->execute();

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    try{
        $mail->addAddress($correo_user, 'Operación Aprobada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Aprobada!';
        $cargar = file_get_contents('aprobado.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Aprobada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha aprobado su operación el dia ' . $hr . ', podrá visualizar el comprobante y recibo mediante la plataforma..</p>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Carta de Residencia Enviada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "solicitud.php";history.forward();history.pushState(null, "", "solicitud.php");},1000);</script>';

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
    $status = 'Aprobado';
    $fecha = date('Y-m-d');

    $sql = $conn->prepare("UPDATE mudanza_scs9_oxerev SET status_scs9_rev = :status, fecha_actual_scs9_rev = :fecha_nueva WHERE id_ref_scs9_rev = '$id_mudanza'");
    $sql->execute(array(":status" => ucfirst($status), ":fecha_nueva" => $fecha));

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    try{
        $mail->addAddress($correo_user, 'Operación Aprobada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Aprobada!';
        $cargar = file_get_contents('aprobado.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Aprobada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha aprobado su operación el dia ' . $hr . ', podrá visualizar el comprobante y recibo mediante la plataforma..</p>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud de Mudanza Aprobada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "solicitud.php";history.forward();history.pushState(null, "", "solicitud.php");},1000);</script>';

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
    $status = 'Aprobado';
    $fecha = date('Y-m-d');

    $sql = $conn->prepare("UPDATE solvencia_scs8_oxerev SET view_scs8_rev = 0, status_scs8_rev = :status, fecha_scs8_rev = :fecha_nueva WHERE id_ref_scs8_rev = '$id_solvencia'");
    $sql->execute(array(":status" => ucfirst($status), ":fecha_nueva" => $fecha));

    $data = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo_user'");
    $data->execute();
    $dato = $data->fetch(PDO::FETCH_OBJ);
    $nombre = $dato->nombre_scs0_rev;

    try{
        $mail->addAddress($correo_user, 'Operación Aprobada');
        $mail->addReplyTo(CorreoCondonimio,"Responder a");
        $mail->Subject = '¡Operación Aprobada!';
        $cargar = file_get_contents('aprobado.html');
        $cargar = str_replace('%oxer%', $nombre, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Operación Aprobada!</h1>
                            <p>Estimado(a) Oxer ' . $nombre . ', se ha aprobado su operación el dia ' . $hr . ', podrá visualizar el comprobante y recibo mediante la plataforma..</p>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados<br></p>';
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en el envio: " . $mail->ErrorInfo . "</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
        } else {
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud de Solvencia Enviada!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "solicitud.php";history.forward();history.pushState(null, "", "solicitud.php");},1000);</script>';

            unset($_SESSION['id_solvencia']);
            unset($_SESSION['op_extra']);
            unset($_SESSION['id_extra']);
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

} else {
    echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Error {solicitud_aprobado[C01]}</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000)';
}

?>
