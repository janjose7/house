<?php

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

require_once "config.php";

$instancia = new Conexion();
$conn = $instancia->Conectar();

try{
    require_once 'correo_mailer.php';

    $mail->addAddress(CorreoCondonimio, 'Contacto Interno'); // Correo del condominio, Nombre del presi
    $mail->addReplyTo(CorreoCondonimio,"Responder a"); // Correo para que el usuario responda al condominio

    $mail->Subject = '¡Ayuda - Contacto!';

    $cargar = file_get_contents('ayuda.html');
    $cargar = str_replace('%reciboNuevo%', $_SESSION['a4'], $cargar);
    $cargar = str_replace('%hora%', $hr, $cargar);
    $mail->msgHTML($cargar, __DIR__ );
    $mail->AltBody = '  <h1>Ayuda</h1>
                        <p><strong>Asunto</strong>: ' . $asunto . '</p>
                        <p><strong>Contenido</strong>: ' . $contenido . '</p>
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
    } else {
        echo "<div class='alert alert-success' role='alert' id='alertaCerrar'>¡Correo enviado!&nbsp;<i class='fa-solid fa-paper-plane'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
    }
} catch (Exception $e){
    echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer: " . $mail->ErrorInfo . "</div>";
}

$resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2");
$resultado->execute();
$registro = $resultado->fetchAll(PDO::FETCH_OBJ);

require_once 'correo_mailer.php';

foreach($registro as $oxeCli){
    $correo = $oxeCli->correo_scs0_rev;

    if($correo != ""){
        if($oxeCli == true){
            echo 'Enviado=> Correo: ' . $correo . ' / ';
        }
    }
}

?>