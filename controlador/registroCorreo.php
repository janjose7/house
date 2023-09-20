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

if(isset($_SESSION['correoSV'])){
    $_SESSION['viviendaSV'];
    $_SESSION['nombreSV'];
    $_SESSION['correoSV'];
} else {
    header("Location: registro.php");
}

$mail = new PHPMailer(true);

$instancia = new Conexion();
$conn = $instancia->Conectar();

$code = trim(htmlentities(addslashes($_POST['codigo']))) ? $_POST['codigo'] : '';

    $correo = $_SESSION['correoSV'];
    $vivienda = $_SESSION['viviendaSV'];
    $nombre = $_SESSION['nombreSV'];

    $buscar = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda'");
    $buscar->execute();
    $home = $buscar->fetch(PDO::FETCH_ASSOC);
    $actual = $home['actual_oxe'];
    $deuda = $home['deuda_oxe'];
    $abono = $home['abono_oxe'];
    $total = $home['total_oxe'];

    $consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo'");
    $consulta->execute();
    $show = $consulta->fetch(PDO::FETCH_ASSOC);
    $codigo = $show['codigo_scs0_rev'];
    $expirar = $show['expirar_scs0_rev'];

    if(time() > $expirar){
    echo "<div class='alert alert-warning' role='alert'>el tiempo ha expirado, por favor solicite un nuevo codigo</div>";
    } elseif(time() < $expirar){
        if($code != $codigo){
            echo "<div class='alert alert-danger' role='alert'>El codigo introducido es incorrecto</div>";
        } elseif($code == $codigo){
            if($deuda != 0){

                $verificado = 'Verificado';
                $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total, status_scs0_rev = :verificado WHERE correo_scs0_rev = '$correo'");
                $result->execute(array(":actual" => $actual, ":deuda" => $deuda, ":total" => $total, ":verificado" => $verificado,));

                // INGRESO DE DATOS A LA TABLA HIJA EXTRAORDINARIO
                $resultado2 = $conn->prepare("INSERT INTO extraordinario_scs2_oxerev (datae_vivienda_scs2_rev) VALUES (:vivienda)");
                $resultado2->execute(array(":vivienda" => $vivienda));

                // INGRESO DE DATOS A LA TABLA HIJA PAGOS
                $resultado3 = $conn->prepare("INSERT INTO pagos_scs1_oxerev (datap_vivienda_scs1_rev) VALUES (:vivienda)");
                $resultado3->execute(array(":vivienda" => $vivienda));

                $nombre = ucwords($nombre);

                try{
                    require_once 'correo_mailer.php';

                    $mail->addAddress($correo, $nombre);
                    $mail->addReplyTo(CorreoOxe,"Responder a");
                    $mail->Subject = '¡Ya eres un Oxer!';

                    $cargar = file_get_contents('verificado.html');
                    $cargar = str_replace('%nombre%', $nombre, $cargar);
                    $cargar = str_replace('%correo%', $correo, $cargar);
                    $cargar = str_replace('%vivienda%', $vivienda, $cargar);
                    $cargar = str_replace('%hora%', $hr, $cargar);
                    $mail->msgHTML($cargar, __DIR__ );
                    $mail->AltBody = '  <h1>Bienvenido</h1>
                                        <h2>¡Hola Oxer!</h2>
                                        <p>¡Bienvenido a la comunidad OxeRev, tu cuenta ya fue creada! Junto a nosotros podrás realizar transacciones de forma ágil y segura, sin descuidar tu bienestar, el de tu familia y el de tu bolsillo</p>
                                        <p>------------------------------------</p>
                                        <p>Nombre Completo: ' . $nombre . '</p>
                                        <p>Correo: ' . $correo . '</p>
                                        <p>Vivienda: ' . $vivienda . '</p>
                                        <p>------------------------------------</p>
                                        <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!</p>
                                        <p>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                                        <p></p>
                                        <p>' . $hr . '</p>
                                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

                    if (!$mail->send()) {
                        echo "<div class='alert alert-danger' role='alert'>Hubo un error en el proceso de envio: " . $mail->ErrorInfo . "</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Verificación exitosa, ahora puede usar los servicios <strong>premium</strong> del sistema</div>";
                        echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},1000);</script>";
                        $result->closeCursor();
                        $resultado2->closeCursor();
                        $resultado3->closeCursor();
                        unset($_SESSION['correoSV']);
                        unset($_SESSION['viviendaSV']);
                        unset($_SESSION['nombreSV']);
                        $conn = null;
                    }
                } catch (Exception $e){
                    echo "<div class='alert alert-danger' role='alert'>Hubo un error en Mailer: " . $mail->ErrorInfo . "</div>";
                }
            } elseif($abono != 0){

                $verificado = 'Verificado';
                $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET abono_oxe = :abono, status_scs0_rev = :verificado WHERE correo_scs0_rev = '$correo'");
                $result->execute(array(":abono" => $abono, ":verificado" => $verificado,));
    
                // INGRESO DE DATOS A LA TABLA HIJA EXTRAORDINARIO
                $resultado2 = $conn->prepare("INSERT INTO extraordinario_scs2_oxerev (datae_vivienda_scs2_rev) VALUES (:vivienda)");
                $resultado2->execute(array(":vivienda" => $vivienda));
    
                // INGRESO DE DATOS A LA TABLA HIJA PAGOS
                $resultado3 = $conn->prepare("INSERT INTO pagos_scs1_oxerev (datap_vivienda_scs1_rev) VALUES (:vivienda)");
                $resultado3->execute(array(":vivienda" => $vivienda));

                $nombre = ucwords($nombre);

                try{
                    require_once 'correo_mailer.php';

                    $mail->addAddress($correo, $nombre);
                    $mail->addReplyTo(CorreoOxe,"Responder a");
                    $mail->Subject = '¡Ya eres un Oxer!';

                    $cargar = file_get_contents('verificado.html');
                    $cargar = str_replace('%nombre%', $nombre, $cargar);
                    $cargar = str_replace('%correo%', $correo, $cargar);
                    $cargar = str_replace('%vivienda%', $vivienda, $cargar);
                    $cargar = str_replace('%hora%', $hr, $cargar);
                    $mail->msgHTML($cargar, __DIR__ );
                    $mail->AltBody = '  <h1>Bienvenido</h1>
                                        <h2>¡Hola Oxer!</h2>
                                        <p>¡Bienvenido a la comunidad OxeRev, tu cuenta ya fue creada! Junto a nosotros podrás realizar transacciones de forma ágil y segura, sin descuidar tu bienestar, el de tu familia y el de tu bolsillo</p>
                                        <p>------------------------------------</p>
                                        <p>Nombre Completo: ' . $nombre . '</p>
                                        <p>Correo: ' . $correo . '</p>
                                        <p>Vivienda: ' . $vivienda . '</p>
                                        <p>------------------------------------</p>
                                        <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!</p>
                                        <p>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                                        <p></p>
                                        <p>' . $hr . '</p>
                                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

                    if (!$mail->send()) {
                        echo "<div class='alert alert-danger' role='alert'>Hubo un error en el proceso de envio: " . $mail->ErrorInfo . "</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Verificación exitosa, ahora puede usar los servicios <strong>premium</strong> del sistema</div>";
                        echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},2000);</script>";
                        $result->closeCursor();
                        $resultado2->closeCursor();
                        $resultado3->closeCursor();
                        unset($_SESSION['correoSV']);
                        unset($_SESSION['viviendaSV']);
                        unset($_SESSION['nombreSV']);
                        $conn = null;
                    }
                } catch (Exception $e){
                    echo "<div class='alert alert-danger' role='alert'>Hubo un error en Mailer: " . $mail->ErrorInfo . "</div>";
                }
            } elseif($deuda == 0 && $abono == 0){

                $verificado = 'Verificado';
                $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET status_scs0_rev = :verificado WHERE correo_scs0_rev = '$correo'");
                $result->execute(array(":verificado" => $verificado,));

                // INGRESO DE DATOS A LA TABLA HIJA EXTRAORDINARIO
                $resultado2 = $conn->prepare("INSERT INTO extraordinario_scs2_oxerev (datae_vivienda_scs2_rev) VALUES (:vivienda)");
                $resultado2->execute(array(":vivienda" => $vivienda));

                // INGRESO DE DATOS A LA TABLA HIJA PAGOS
                $resultado3 = $conn->prepare("INSERT INTO pagos_scs1_oxerev (datap_vivienda_scs1_rev) VALUES (:vivienda)");
                $resultado3->execute(array(":vivienda" => $vivienda));

                $nombre = ucwords($nombre);

                try{
                    require_once 'correo_mailer.php';

                    $mail->addAddress($correo, $nombre);
                    $mail->addReplyTo(CorreoOxe,"Responder a");
                    $mail->Subject = '¡Ya eres un Oxer!';

                    $cargar = file_get_contents('verificado.html');
                    $cargar = str_replace('%nombre%', $nombre, $cargar);
                    $cargar = str_replace('%correo%', $correo, $cargar);
                    $cargar = str_replace('%vivienda%', $vivienda, $cargar);
                    $cargar = str_replace('%hora%', $hr, $cargar);
                    $mail->msgHTML($cargar, __DIR__ );
                    $mail->AltBody = '  <h1>Bienvenido</h1>
                                        <h2>¡Hola Oxer!</h2>
                                        <p>¡Bienvenido a la comunidad OxeRev, tu cuenta ya fue creada! Junto a nosotros podrás realizar transacciones de forma ágil y segura, sin descuidar tu bienestar, el de tu familia y el de tu bolsillo</p>
                                        <p>------------------------------------</p>
                                        <p>Nombre Completo: ' . $nombre . '</p>
                                        <p>Correo: ' . $correo . '</p>
                                        <p>Vivienda: ' . $vivienda . '</p>
                                        <p>------------------------------------</p>
                                        <p>Sí no has sido tú, lo sentimos, ¡ignora este correo!</p>
                                        <p>¡Recuerda que OxeRev es una comunidad y estamos aquí para apoyarte en lo que necesites!</p>
                                        <p></p>
                                        <p>' . $hr . '</p>
                                        <p>OxeRev © 2022 | Guatire<br>@Oxerev<br>Todos los derechos reservados</p>';

                    if (!$mail->send()) {
                        echo "<div class='alert alert-danger' role='alert'>Hubo un error en el proceso de envio: " . $mail->ErrorInfo . "</div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>Verificación exitosa, ahora puede usar los servicios <strong>premium</strong> del sistema</div>";
                        echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},2000);</script>";
                        $result->closeCursor();
                        $resultado2->closeCursor();
                        $resultado3->closeCursor();
                        unset($_SESSION['correoSV']);
                        unset($_SESSION['viviendaSV']);
                        unset($_SESSION['nombreSV']);
                        $conn = null;
                    }
                } catch (Exception $e){
                    echo "<div class='alert alert-danger' role='alert'>Hubo un error en Mailer: " . $mail->ErrorInfo . "</div>";
                }
            } else {
            echo "<div class='alert alert-danger' role='alert'>Lo sentimos, ha ocurrido un error</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Lo sentimos, ha ocurrido un error inesperado</div>";
        }
        $conn = null;
    }


$conn = null;


?>