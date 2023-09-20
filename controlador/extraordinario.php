<?php

session_start();

require_once 'config.php';

$instancia_tablas = new Conexion();
$conn = $instancia_tablas->Conectar();

$data = $_SESSION['rev_vivienda'];
$usu = $_SESSION['rev_usuario'];
$nom = $_SESSION['rev_conectado'];
$ema = $_SESSION['rev_correo'];
$ref = trim(htmlentities(addslashes($_POST['referencia']))) ? $_POST['referencia'] : '';
$metodo = trim(htmlentities(addslashes($_POST['metodo']))) ? $_POST['metodo'] : 'nulo';
$crypto = bin2hex(random_bytes(3));
$status = 1;

try {
    if( $metodo == 'nulo'){
        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> Por favor, seleccione un método de pago válido</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';

    } elseif(isset($_SESSION['alquilerParque'])){
        $op2a = $_SESSION['alquilerParque'];
        $op1a = $_SESSION['fechaParque'];
        $status = 'Pendiente';
        $view = 1;

        $result = $conn->prepare("INSERT INTO pagos_alquiler_scs10_oxerev (vivienda_scs10_rev, correo_scs10_rev, referencia_scs10_rev, modalidad_scs10_rev, comentario_scs10_rev, view_scs10_rev, codigo_scs10_rev) VALUES (:dat, :ema, :ref, :met, :com, :view, :cod)");
        $result->execute(array(":dat" => $data, ":ema" => $ema, ":ref" => $ref, ":met" => $metodo, ":com" => ucfirst($op2a), ":view" => $view, ":cod" => $crypto));

        $insertar = $conn->prepare("INSERT INTO alquiler_scs6_oxerev (vivienda_scs6_rev, correo_scs6_rev, nombre_scs6_rev, comentario_scs6_rev, codigo_scs6_rev, status_scs6_rev, fecha_scs6_rev) VALUES (:vivienda, :correo, :nombre, :comentario, :codigo, :status, :fecha)");
        $insertar->execute(array(":vivienda" => $data, ":correo" => $ema, ":nombre" => $nom, ":comentario" => ucfirst($op2a), ":codigo" => $crypto, ":status" => $status, ":fecha" => $op1a));
        $result->closeCursor();
        $insertar->closeCursor();
        $conn = null;
        unset($_SESSION['alquilerParque']);
        unset($_SESSION['fechaParque']);
        unset($_SESSION['comentarioParque']);

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Enviados con Éxito!</strong> En breve se le enviará el ticket del pago<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1500);</script>';

    } elseif(isset($_SESSION['cartaResidencia'])){
        // INGRESO DE DATOS DE PAGO POR CARTA DE RESICENCIA
        $comt_c = $_SESSION['cartaResidencia'];
        $op1cr = $_SESSION['cedula']; // CEDULA
        $op2cr = $_SESSION['antiguedad']; //ANTIGÜEDAD
        $op3cr = $_SESSION['piso']; //PISO
        $op4cr = $_SESSION['membrete']; //MEMBRETE

        $insertar = $conn->prepare("INSERT INTO kresidencia_scs7_oxerev (vivienda_scs7_rev, correo_scs7_rev, nombre_scs7_rev, cedula_scs7_rev, antiguedad_scs7_rev, piso_scs7_rev, membrete_scs7_rev, view_scs7_rev, codigo_scs7_rev) VALUES (:vivienda, :correo, :nombre, :cedula, :antiguedad, :piso, :membrete, :view, :codigo)");
        $insertar->execute(array(":vivienda" => $data, ":correo" => $ema, ":nombre" => $nom, ":cedula" => $op1cr, ":antiguedad" => $op2cr, ":piso" => $op3cr, ":membrete" => ucfirst($op4cr), ":view" => $status, ":codigo" => $crypto));

        $result = $conn->prepare("INSERT INTO pagos_kresidencia_scs11_oxerev (vivienda_scs11_rev, correo_scs11_rev, referencia_scs11_rev, modalidad_scs11_rev, comentario_scs11_rev, view_scs11_rev, codigo_scs11_rev) VALUES (:dat, :ema, :ref, :met, :com, :view, :cod)");
        $result->execute(array(":dat" => $data, ":ema" => $ema, ":ref" => $ref, ":met" => $metodo, ":com" => $comt_c, ":view" => $status, ":cod" => $crypto));
        $insertar->closeCursor();
        $result->closeCursor();
        $conn = null;
        unset($_SESSION['cartaResidencia']);
        unset($_SESSION['cedula']);
        unset($_SESSION['antiguedad']);
        unset($_SESSION['piso']);
        unset($_SESSION['membrete']);

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Enviados con Éxito!</strong> En breve se le enviará la Carta de Residencia<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1500);</script>';

    } elseif($metodo == 'Pago Movil' || $metodo == 'Transferencia'){
        $comt = trim(htmlentities(addslashes($_POST['comentario']))) ? $_POST['comentario'] : 'Pago Extraordinario';

        $resultado = $conn->prepare("INSERT INTO extraordinario_scs2_oxerev (datae_vivienda_scs2_rev, usuario_scs2_rev, referencia_scs2_rev, modalidad_scs2_rev, comentario_scs2_rev, view_scs2_rev, codigo_scs2_rev) VALUES (:dat, :usu, :ref, :met, :com, :view, :cod)");
        $resultado->execute(array(":dat" => $data, ":usu" => $usu, ":ref" => $ref, ":met" => $metodo, ":com" => $comt, ":view" => $status, ":cod" => $crypto));
        $resultado->closeCursor();
        $conn = null;

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Enviados con Éxito!</strong></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1500);</script>';
    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {extraordinario[C01]}</strong> Ha ocurrido un error</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    }

} catch (Exception $e_fatal) {

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {extraordinario[C02]}</strong> Ha ocurrido un error inesperado:" . $e_fatal->getMessage() ."</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';

} finally {

    $conn = null;
}


?>