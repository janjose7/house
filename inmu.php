<?php

require_once 'controlador/config.php';
//print_r(date_default_timezone_set('UTC'));
date_default_timezone_set('America/Caracas');
//print_r(date('Y-m-d H:i', time()))

$instancia = new Conexion();
$obj = $instancia->Conectar();

$user = $_POST['Inmueble'];
echo $user.'<br>';

$buscar = $obj->prepare("SELECT * FROM membresia_oxerev WHERE usuario_mship_rev = '$user'");
$buscar->execute();
$listo = $buscar->fetch(PDO::FETCH_OBJ);
$tiempo = $listo->timestamp_mship_rev;
$duracion = $listo->duracion_mship_rev;
$membresia = date('Y-m-d H:i', strtotime(date('Y-m-d H:i', strtotime($tiempo)) . $duracion));

if($membresia < date('Y-m-d H:i')){
    echo 'membership has expired! Debes de pagar para poder usar los servicios ya que expiro en la fecha de: ' .$membresia .'<br>';
    echo "$tiempo // $membresia";
} elseif($membresia > date('Y-m-d H:i')){
    //echo 'membership is live!';
    //echo "$tiempo // $membresia";
    header('Location: login.php');
} else {
    echo 'error';
}

$query = $conn->prepare("SELECT DISTINCT vivienda_scs0_rev FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2");
$query->execute();
$contador = $query->rowCount();
echo $contador;
?>