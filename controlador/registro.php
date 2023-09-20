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

$nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : '';
$vivienda = trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
$correo = trim(htmlentities(addslashes($_POST['dcorreo']))) ? $_POST['dcorreo'] : '';
$clave = trim(htmlentities(addslashes($_POST['pass1']))) ? $_POST['pass1'] : '';
$rclave = trim(htmlentities(addslashes($_POST['pass2']))) ? $_POST['pass2'] : '';
$clave_cryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
$user = trim(htmlentities(addslashes($_POST['usuariorev']))) ? $_POST['usuariorev'] : '';
$rol = 2;
$status = 'noVerificado';
$copropietario = 'Copropietario';
$codigo =  rand(999999, 111111);
$expirar = time() + (60 * 5); // Tiene 5 minutos de tiempo para expirar


try
{
    if($clave != $rclave){
        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'>¡Las contraseñas no son iguales!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

    } elseif($clave == $rclave){
        $query = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo OR  user_scs0_rev = :user_rev");
        $query->execute([':correo' => $correo, ':user_rev' => $user]);

        if ($query->fetchColumn())
        {
            echo "<div class='alert alert-warning' role='alert'>¡Ya existe este correo y/o usuario en la Base de Datos, por favor intente con datos nuevos!</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

        } else {

            $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
            $buscar->execute([':vivienda' => $vivienda]);

            if(!$buscar->fetchColumn()){

                echo "<div class='alert alert-danger' role='alert'>La vivienda introducida no existe</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

            } else{

                    // INGRESO DE DATOS A LA TABLA PADRE USUARIOS
                    $resultado = $conn->prepare("INSERT INTO usuarios_scs0_oxerev (rol_scs0_rev, pro_in_scs0_rev, nombre_scs0_rev, vivienda_scs0_rev, correo_scs0_rev, clave_scs0_rev, user_scs0_rev, status_scs0_rev, codigo_scs0_rev, expirar_scs0_rev) VALUES (:rol, :copro, :nombre, :vivienda, :correo, :clave, :user, :status, :codigo, :expirar)");
                    $resultado->execute(array(":rol" => $rol, ":copro" => ucfirst($copropietario), ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => strtolower($correo), ":clave" => $clave_cryp, ":user" => strtolower($user), ":status" => $status, ":codigo" => $codigo, ":expirar" => $expirar));

                    $_SESSION['correoSV'] = $correo;
                    $_SESSION['viviendaSV'] = $vivienda;
                    $_SESSION['nombreSV'] = ucwords($nombre);

                    $correo = strtolower($correo);
                    $nombre = ucwords($nombre);

                    try{
                        require_once 'correo_mailer.php';

                        $mail->addAddress($correo, $nombre);
                        $mail->addReplyTo(CorreoOxe,"Responder a");
                        $mail->Subject = '¡Confirmemos tu cuenta OxeRev!';

                        $cargar = file_get_contents('verificar.html');
                        $cargar = str_replace('%codigo%', $codigo, $cargar);
                        $cargar = str_replace('%hora%', $hr, $cargar);
                        $mail->msgHTML($cargar, __DIR__ );
                        $mail->AltBody = '  <h1>Código de Verificación</h1>
                                            <h2>¡Hola!</h2>
                                            <p>¡Recibimos la solicitud para la creación de tu cuenta en OxeRev! Debemos validarla a través de este correo, para ello ingresa a la plataforma utilizando el siguiente código temporal</p>
                                            <p>------------------------------------</p>
                                            <h2><strong>' . $codigo . '</strong></h2>
                                            <p>------------------------------------</p>
                                            <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!<br>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                                            <p>' . $hr . '</p>
                                            <br>
                                            <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

                        if (!$mail->send()) {
                            echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'>Hubo un error en Mailer: " . $mail->ErrorInfo . "</div>";
                            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
                        } else {
                            echo "<div class='alert alert-success' role='alert'>Proceso exitoso, ya casi está listo... Revise su bandeja  de correo electrónico</div>";
                            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'registro_correo.php';history.forward();history.pushState(null, '', 'registro_correo.php');},1000);</script>";
                        }
                    } catch (Exception $e){
                        echo "<div class='alert alert-danger' role='alert'>Ha ocurrido un error en Mailer: " . $mail->ErrorInfo . "</div>";
                    }
                $conn = null;
        }
    }
} else {
    echo "<div class='alert alert-danger' role='alert' id='alertaCerrar'><strong>¡Ups!</strong> Error {registro[C01]}</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500)';
    $conn = null;
}


} catch (Exception $e_fatal) {

    die("<div class='alert alert-danger' role='alert'>Error {registro[C02]}</div>");

} finally {

    $conn = null;
}

