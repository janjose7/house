<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 1)
{
    header("../index.php");
} else {
    header("Location: ../../controlador/out.php");
}

date_default_timezone_set('America/Caracas');

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

require '../../controlador/PHPMailer/Exception.php';
require '../../controlador/PHPMailer/PHPMailer.php';
require '../../controlador/PHPMailer/SMTP.php';
require_once "../../controlador/config.php";
require 'dompdf/autoload.inc.php';

$mail = new PHPMailer(true);
$doc = new Dompdf();
$instancia = new Conexion();
$conn = $instancia->Conectar();

$a4 = $_SESSION['a4'];
$home = $_SESSION['edif_nc'];

$pdf = 'ReciboNuevo.pdf';
$doc->setPaper('A4', 'portrait');
$doc->loadHtml($a4);
$doc->render();
$archivo = $doc->output();
file_put_contents($pdf, $archivo);

require_once '../../controlador/correo_mailer.php';

$mail->addAddress(CorreoCondonimio);

$nLike = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev NOT LIKE '$home%' AND rol_scs0_rev = 2");
$nLike->execute();
$regLike = $nLike->fetchAll(PDO::FETCH_OBJ);
foreach($regLike as $data){
    if($data->correo_scs0_rev != ''){
        $mail->addAddress($data->correo_scs0_rev, ucwords($data->nombre_scs0_rev));
        $mail->Subject = '¡Recibo Nuevo!';
        $mail->addAttachment($pdf);
        $cargar = file_get_contents('cargar_correo.html');
        $cargar = str_replace('%oxer%', ucwords($data->nombre_scs0_rev), $cargar);
        $cargar = str_replace('%home%', strtoupper($data->vivienda_scs0_rev), $cargar);
        $cargar = str_replace('%hora%', $hr, $cargar);
        $mail->msgHTML($cargar, __DIR__ );
        $mail->AltBody = '  <h1>¡Recibo Nuevo!</h1>
                            <p>Estimado(a) Oxer ' . ucwords($data->nombre_scs0_rev) . ', se ha cargado un nuevo recibo a su vivienda ' . strtoupper($data->vivienda_scs0_rev) . ' con la fecha de emisión ' . $hr . '.</p><p>' . $a4 . '</p>
                            <br>
                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';
        try{
            $mail->send();
        } catch (Exception $e) {
            echo "<div class='alert alert-danger' role='alert'>Por favor intente nuevamente<br>Hubo un error con el envío de correo masivo {ev02[100]}: " . $mail->ErrorInfo . "</div>";
        }
    }
    $mail->clearAddresses();
}
unlink($pdf);
$mail->smtpClose();
echo "<h3>¡¡Correos Enviados con Éxito!!</h3>";
echo "<script>function cerrar(){var ventana = window.self;ventana.opener = window.self;ventana.close();}setTimeout('cerrar()',700);</script>";

?>