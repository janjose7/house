<?php

session_start();

date_default_timezone_set('America/Caracas');

if(isset($_SESSION['correoSV'])){
    $_SESSION['correoSV'];
} else {
    header("Location: olvido.php");
}
require_once "config.php";

$instancia = new Conexion();
$conn = $instancia->Conectar();

$clave = trim(htmlentities(addslashes($_POST['clave']))) ? $_POST['clave'] : '';
$rclave = trim(htmlentities(addslashes($_POST['rclave']))) ? $_POST['rclave'] : '';
$eclave = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 15));;

if($clave != $rclave){
    echo "<div class='alert alert-warning' role='alert'>Las contraseñas deben de ser iguales</div>";
} elseif($clave == $rclave){
    $correo = $_SESSION['correoSV'];
    $verificado = 'Verificado';
    $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET clave_scs0_rev = :clave,  status_scs0_rev = :verificado WHERE correo_scs0_rev = '$correo'");
    $result->execute(array(":clave" => $eclave, ":verificado" => $verificado));

    echo "<div class='alert alert-success' role='alert'>Recuperación de contraseña Exitosa</div>";
    echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'controlador/out.php';history.forward();history.pushState(null, '', 'controlador/out.php');},2000);</script>";
    $result->closeCursor();
    $conn = null;
} else {
    echo "<div class='alert alert-danger' role='alert'>Error {recuperarCorreo[C01]}</div>";
}






?>