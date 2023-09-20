<?php

require_once 'config.php';

date_default_timezone_set('America/Caracas');

$instancia = new Conexion();
$conn = $instancia->Conectar();

$o = trim(htmlentities(addslashes($_POST['operador'])));

switch ($o){
    case 'Seleccione':
        echo "<div class='alert alert-warning' id='alertaCerrar' role='alert'>Necesita seleccionar una acción para poder operar</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
    break;

    case 'Abono':
        $pro = 'Propietario';
        $rol = 2;
        $propietario =  trim(htmlentities(addslashes($_POST['propietario']))) ? $_POST['propietario'] : '';
        $vivienda =  trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $monto = trim(htmlentities(addslashes($_POST['monto']))) ? $_POST['monto'] : '';

        $in = $conn->prepare("INSERT INTO usuarios_scs0_oxerev (rol_scs0_rev, pro_in_scs0_rev, nombre_scs0_rev, vivienda_scs0_rev, abono_oxe) VALUES (:rol, :propietario, :nombre, :vivienda, :abono)");
        $in->execute(array(":rol" => $rol, ":propietario" => ucwords($pro),":nombre" => ucwords($propietario), ":vivienda" => $vivienda, ":abono" => round($monto, 2)));
        echo "<div class='alert alert-success' id='alertaCerrar' role='alert'>Se cargo un apto con abono existente</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
        $conn = null;
    break;

    case 'Deuda':
        $pro = 'Propietario';
        $rol = 2;
        $propietario =  trim(htmlentities(addslashes($_POST['propietario']))) ? $_POST['propietario'] : '';
        $vivienda =  trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $monto = trim(htmlentities(addslashes($_POST['monto']))) ? $_POST['monto'] : '';

        $in = $conn->prepare("INSERT INTO usuarios_scs0_oxerev (rol_scs0_rev, pro_in_scs0_rev, nombre_scs0_rev, vivienda_scs0_rev, deuda_oxe, total_oxe) VALUES (:rol, :propietario, :nombre, :vivienda, :deuda, :total)");
        $in->execute(array(":rol" => $rol, ":propietario" => ucwords($pro),":nombre" => ucwords($propietario),":vivienda" => $vivienda, ":deuda" => $monto, ":total" => round($monto, 2)));
        echo "<div class='alert alert-success' id='alertaCerrar' role='alert'>Se cargo un apto con deuda existente</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
        $conn = null;
    break;

    default:
        echo "<div class='alert alert-danger' id='alertaCerrar' role='alert'><strong><strong>Error {sync[C01]}</strong></strong> Lo sentimos pero su acción no es válida</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
}
?>