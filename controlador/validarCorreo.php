<?php

session_start();

if(isset($_SESSION['correoSV'])){
    $_SESSION['correoSV'];
} else {
    header("Location: olvido.php");
}

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
    echo "<div class='alert alert-warning' role='alert'>El tiempo ha expirado</div>";
    } elseif(time() < $expirar){
        if($code != $codigo){
            echo "<div class='alert alert-warning' role='alert'>Código incorrecto</div>";
        } elseif($code == $codigo){
            echo "<div class='alert alert-success' role='alert'>¡Verificación exitosa!</div>";
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'recuperar_correo.php';history.forward();history.pushState(null, '', 'recuperar_correo.php');},1000);</script>";
        }
    }
?>