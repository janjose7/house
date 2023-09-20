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
require_once "config.php";

$mail = new PHPMailer(true);

$instancia = new Conexion();
$conn = $instancia->Conectar();

$correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : '';

$buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo");
$buscar->execute([':correo' => $correo]);

if(!$buscar->fetchColumn()){
    echo "<div class='alert alert-danger' role='alert'>El correo no existe en la base de datos</div>";
    $conn = null;
} else {
    $codigo =  rand(999999, 111111);
    $expirar = time() + (60 * 5); // Tiene 5 minutos de tiempo para expirar

    $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET codigo_scs0_rev = :codigo, expirar_scs0_rev = :expirar WHERE correo_scs0_rev = '$correo'");
    $result->execute(array(":codigo" => $codigo, ":expirar" => $expirar));

    try{
        require_once 'correo_mailer.php';

        $mail->addAddress($correo);
        $mail->addReplyTo(CorreoOxe,"Responder a");

        $mail->Subject = '¡Solicitud de Nuevo Código!';

        $cargar = file_get_contents('solicitarCodigo.html');
        $cargar = str_replace('%codigo%', $codigo, $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>Código de Verificación</h1>
                            <h2>¡Hola!</h2>
                            <p>¡Recibimos la solicitud para un nuevo código! Tu código debe contar con seis dígitos y no debes dárselo a nadie más</p>
                            <p>------------------------------------</p>
                            <h2><strong>' . $codigo . '</strong></h2>
                            <p>------------------------------------</p>
                            <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!<br>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                            <p>' . $hr . '</p>
                            <br>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert'>Error {olvido[C01]}: " . $mail->ErrorInfo . "</div>";
        } else {
            $_SESSION['correoSV'] = $correo;
            echo "<div class='alert alert-success' role='alert'>Código de recuperación enviado: <strong>$correo</strong></div>";
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'olvido_correo.php';history.forward();history.pushState(null, '', 'olvido_correo.php');},1000);</script>";
            $result->closeCursor();
            $buscar->closeCursor();
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer {olvido[C02]}: " . $mail->ErrorInfo . "</div>";
        $conn = null;
    }
}
