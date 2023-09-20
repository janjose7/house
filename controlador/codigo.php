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

$buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo OR  user_scs0_rev = :user_rev");
$buscar->execute([':correo' => $correo, ':user_rev' => $correo]);

if(!$buscar->fetchColumn()){
    echo "<div id='alertaCerrar' class='alert alert-danger' role='alert'>El correo ó usuario no existen</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
} else {
    $consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo' OR user_scs0_rev = '$correo'");
    $consulta->execute();
    $show = $consulta->fetch(PDO::FETCH_ASSOC);
    $codigo = $show['codigo_scs0_rev'];
    $expirar = $show['expirar_scs0_rev'];
    
    if($show['status_scs0_rev'] == 'Verificado'){
        echo "<div class='alert alert-info' role='alert'>Su correo electrónico ya esta validado, ya puede iniciar sessión</div>";
        echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},1500);</script>";
    } elseif($show['status_scs0_rev'] == 'noVerificado'){
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
                                <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!<br>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                                <p>' . $hr . '</p>
                                <br>
                                <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';
    
            if (!$mail->send()) {
                echo "<div class='alert alert-danger' role='alert'>Hubo un error en el proceso de envio: " . $mail->ErrorInfo . "</div>";
            } else {
                echo "<div class='alert alert-info' role='alert'>Código de verificación enviado: $correo</div>";
                echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'solicitud_confirmar.php';history.forward();history.pushState(null, '', 'solicitud_confirmar.php');},1000);</script>";
                $_SESSION['correoSV'] = $correo;
                $result->closeCursor();
                $consulta->closeCursor();
                $buscar->closeCursor();
                $conn = null;
            }
        } catch (Exception $e){
            echo "<div class='alert alert-danger' role='alert'>Hubo un error Mailer{codigo[C01]}: " . $mail->ErrorInfo . "</div>";
            $conn = null;
        }
    
    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger' role='alert'>Error {codigo[C02]} Ha ocurrido un error inesperado</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    }
}


?>