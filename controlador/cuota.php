<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';

$instancia_tablas = new Conexion();
$conn = $instancia_tablas->Conectar();

$data = $_SESSION['rev_vivienda'];
$usu = $_SESSION['rev_usuario'];
$ref = trim(htmlentities(addslashes(isset($_POST['referencia'])))) ? $_POST['referencia'] : '';
$metodo = trim(htmlentities(addslashes(isset($_POST['metodo'])))) ? $_POST['metodo'] : 'nulo';
$comt = trim(htmlentities(addslashes(isset($_POST['comentario'])))) ? $_POST['comentario'] : 'Pago de la vivienda';
$crypto = bin2hex(random_bytes(3));
$status = 1;

try {
    if( $metodo == 'nulo'){
        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Por favor, seleccione un método de pago válido</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    } elseif($metodo == 'Pago Movil' || $metodo == 'Transferencia'){
        $resultado = $conn->prepare("INSERT INTO pagos_scs1_oxerev (datap_vivienda_scs1_rev, usuario_scs1_rev, referencia_scs1_rev, modalidad_scs1_rev, comentario_scs1_rev, view_scs1_rev, codigo_scs1_rev) VALUES (:dat, :usu, :ref, :met, :com, :view, :codi)");
        $resultado->execute(array(":dat" => $data, ":usu" => $usu, ":ref" => $ref, ":met" => $metodo, ":com" => $comt, ":view" => $status, ":codi" => $crypto));
        $resultado->closeCursor();
        $conn = null;
        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Enviados con Éxito!</strong></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1500);</script>';


    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {cuota[C01]}</strong> Ha ocurrido un error</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    }
} catch (Exception $e_fatal) {

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {cuota[002]}</strong> Ha ocurrido un error inesperado:" . $e_fatal->getMessage() ."</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';

} finally {

    $conn = null;
}


?>