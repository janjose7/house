<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once "config.php";

$instancia = new Conexion();
$conn = $instancia->Conectar();

$correo = $_SESSION['correoSV'];
$code = trim(htmlentities(addslashes($_POST['codigo']))) ? $_POST['codigo'] : '';

$consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo'");
$consulta->execute();
$show = $consulta->fetch(PDO::FETCH_ASSOC);
$codigo = $show['codigo_scs0_rev'];
$expirar = $show['expirar_scs0_rev'];

if(time() > $expirar){
    echo "<div class='alert alert-warning' role='alert'>El tiempo ha expirado, por favor solicite un nuevo código</div>";
    } elseif(time() < $expirar){
        if($code != $codigo){
            echo "<div class='alert alert-warning' role='alert'>El codigo introducido es incorrecto</div>";
        } elseif($code == $codigo){
            $verificado = 'Verificado';
            $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET status_scs0_rev = :verificado WHERE correo_scs0_rev = '$correo'");
            $result->execute(array(":verificado" => $verificado,));
            echo "<div class='alert alert-success' role='alert'>¡Verificación exitosa, ahora puede usar los servicios premium del sistema!</div>";
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},1500);</script>";
        }
    }
?>