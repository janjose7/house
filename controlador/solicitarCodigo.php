<?php

session_start();

date_default_timezone_set('America/Caracas');

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

$correo = $_SESSION['correoSV'];
$consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo'");
$consulta->execute();
$show = $consulta->fetch(PDO::FETCH_ASSOC);
$codigo = $show['codigo_scs0_rev'];
$expirar = $show['expirar_scs0_rev'];


if(time() < $expirar){
    echo "<div class='alert alert-success' role='alert'>Su código de verificación aún es válido</div>";
} elseif(time() > $expirar){
    $status = 'noVerificado';
    $codigo =  rand(999999, 111111);
    $expirar = time() + (60 * 5); // Tiene 5 minutos de tiempo para expirar

    $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET status_scs0_rev = :status, codigo_scs0_rev = :codigo, expirar_scs0_rev = :expirar WHERE correo_scs0_rev = '$correo'");
    $result->execute(array(":status" => $status, ":codigo" => $codigo, ":expirar" => $expirar));

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
                            <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!</p>
                            <p>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                            <p>' . $hr . '</p>
                            <br>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert'>Hubo un error en el proceso de envio: " . $mail->ErrorInfo . "</div>";
        } else {
            echo "<div class='alert alert-info' role='alert'>Nuevo código enviado a <strong>$correo</strong></div>";
            $result->closeCursor();
            $conn = null;
        }
    } catch (Exception $e){
        echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
    }

} else {
    echo "<div class='alert alert-danger' role='alert'>Error {solicitarCodigo[C01]}</div>";
}


?>