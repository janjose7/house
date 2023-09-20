<?php

require_once 'config.php';

date_default_timezone_set('America/Caracas');

$instancia = new Conexion();
$conn = $instancia->Conectar();

//******* OPERADORES DEL UI ******/
$o = trim(htmlentities(addslashes($_POST['operador'])));
$f = trim(htmlentities(addslashes($_POST['fondo_rsv'])));
$mo = trim(htmlentities(addslashes($_POST['monto_fondo'])));
$m = round($mo, 2);
//******* /OPERADORES DEL UI ******/

//******* FONDO DE RESERVA ******/
$fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 1");
$fondos->execute();
$fondo = $fondos->fetch(PDO::FETCH_ASSOC);
$rsv_mont = $fondo['monto_scs12_rev'];
//******* /FONDO DE RESERVA ******/

//******* FONDO DE PRESTACIONES ******/
$fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 2");
$fondos->execute();
$fondo = $fondos->fetch(PDO::FETCH_ASSOC);
$fdp_mont = $fondo['monto_scs12_rev'];
//******* /FONDO DE PRESTACIONES ******/

//************ OPERACIONES ************/
switch ($f){
    case 'Seleccione':
        echo "<div class='alert alert-warning' id='alertaCerrar' role='alert'>Necesita seleccionar un fondo para poder operar</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
    break;

    case 'Reserva':
        switch ($o){
            case 'Seleccione':
                echo "<div class='alert alert-warning' id='alertaCerrar' role='alert'>Necesita seleccionar una acción para poder operar</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
            break;

            case 'Credito':
                $credito = $rsv_mont + $m;
                $resultado = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :credito WHERE id_ref_scs12_rev = 1");
                $resultado->execute(array(":credito" => $credito));
                echo "<div class='alert alert-success' id='alertaCerrar' role='alert'><strong>Carga Exitosa</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
                $conn = null;
            break;

            case 'Debito':
                $debito = $rsv_mont - $m;
                $resultado = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :debito WHERE id_ref_scs12_rev = 1");
                $resultado->execute(array(":debito" => $debito));
                echo "<div class='alert alert-success' id='alertaCerrar' role='alert'><strong>Carga Exitosa</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
                $conn = null;
            break;

            default:
                echo "<div class='alert alert-danger' id='alertaCerrar' role='alert'>Lo sentimos pero su acción no es válida<br>Error {sync_fondos[C01]}</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
        }
    break;

    case 'Prestaciones':
        switch ($o){
            case 'Seleccione':
                echo "<div class='alert alert-warning' id='alertaCerrar' role='alert'>Necesita seleccionar una acción para poder operar</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
            break;

            case 'Credito':
                $credito = $fdp_mont + $m;
                $resultado = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :credito WHERE id_ref_scs12_rev = 2");
                $resultado->execute(array(":credito" => $credito));
                echo "<div class='alert alert-success' id='alertaCerrar' role='alert'><strong>Carga Exitosa</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
                $conn = null;
            break;

            case 'Debito':
                $debito = $fdp_mont - $m;
                $resultado = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :debito WHERE id_ref_scs12_rev = 2");
                $resultado->execute(array(":debito" => $debito));
                echo "<div class='alert alert-success' id='alertaCerrar' role='alert'><strong>Carga Exitosa</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
                $conn = null;
            break;

            default:
                echo "<div class='alert alert-danger' id='alertaCerrar' role='alert'>Lo sentimos pero su acción no es válida<br>Error {sync_fondos[C02]}</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
        }
    break;

    default:
    echo "<div class='alert alert-danger' id='alertaCerrar' role='alert'>Error {sync_fondos[C03]}</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 4000);</script>';
}
//************ /OPERACIONES ************/
?>