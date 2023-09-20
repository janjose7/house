<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';
$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

$id_ref = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
$m = trim(htmlentities(addslashes($_POST['ab']))) ? $_POST['ab'] : 0; // MONTO
$n = round($m, 2);
$concept = trim(htmlentities(addslashes($_POST['co']))) ? $_POST['co'] : '*******';
$usuario = trim(htmlentities(addslashes(isset($_POST['usu'])))) ? $_POST['usu'] : '';
$vivienda = trim(htmlentities(addslashes(isset($_POST['viv'])))) ? $_POST['viv'] : '';
$nulo = 0;
$crypto = bin2hex(random_bytes(3));
$concepto = ucfirst($concept);

//****** Conversión al dólar *****/
$tasa_bd = $conn->prepare("SELECT * FROM tasa_scs13_oxerev WHERE id_scs13_rev = 1");
$tasa_bd->execute();
$tasa_show = $tasa_bd->fetch(PDO::FETCH_OBJ);
$tasa = $tasa_show->tasa_actual_scs13_rev;

//***** MOSTRANDO DATOS DEL PROPIETARIO *****/
$sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda'");
$sql->execute();

$show = $sql->fetch(PDO::FETCH_ASSOC);
$no = $show['nombre_scs0_rev'];
$vi = $show['vivienda_scs0_rev'];
$ac = $show['actual_oxe'];
$de = $show['deuda_oxe'];
$ab = $show['abono_oxe'];
$to = $show['total_oxe'];


switch($n){
    case $n:
        //MOSTRANDO DATOS DEL PROPIETARIO
        $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda'");
        $sql->execute();

        $show = $sql->fetch(PDO::FETCH_ASSOC);
        $no = $show['nombre_scs0_rev'];
        $vi = $show['vivienda_scs0_rev'];
        $ac = $show['actual_oxe'];
        $de = $show['deuda_oxe'];
        $ab = $show['abono_oxe'];
        $to = $show['total_oxe'];

        $abot = $to - $n;
        $abod = $de - $n;

        // QUERY SQL
        if ($ab >= 0 && $de == 0){
            // PROCESO DE ABONO
            $total_a = $ab + $n;
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET abono_oxe = :abono WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":abono" => round($total_a, 2)));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();
            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($de == $ab && $n > $de){
            $nsu= $ab + $n;
            $nre = $nsu - $de;
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total  WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => round($nre, 2), ":total" => $nulo));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D, acumulando " . number_format($nre, 2, ',', '.') . " Bs.D abonados <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($de == $ab && $n < $de){
            $nsu= $ab + $n;
            $nre = $nsu - $de;
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => round($nre, 2), ":total" => $nulo));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D, acumulando " . number_format($nre, 2, ',', '.') . " Bs.D abonados <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($de > $ab && $n > $de){
            $nsu = $n + $ab;
            $nre = $nsu - $de;
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => round($nre, 2), ":total" => $nulo));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D, acumulando " . number_format($nre, 2, ',', '.') . " Bs.D abonados <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($abot < 0){
            $abono = abs($abot);
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => round($abono, 2), ":total" => $nulo));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($to == $n){
            $rec = $to - $n; // OPERACION DEL NUEVO RECIBO
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $nulo, ":total" => $nulo));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($ab == 0 && $to >= 0.01){
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET  deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":deuda" => $abod, ":abono" => $nulo, ":total" => round($abot, 2)));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D. Deuda acumulada de " . number_format($abot, 2, ',', '.') . " Bs.D <i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else if ($de > $ab && $n <= $de){
            $nsu = $ab + $n;
            $nre = $de - $nsu;
            $n_u = $n / $tasa;
            $n_usd = round($n_u, 2);
            // PROCESO DE ABONO
            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET  deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$vivienda'");
            $resultado->execute(array(":deuda" => round($nre, 2), ":abono" => $nulo, ":total" => round($nre, 2)));

            // COMPROBANTE
            $resultado = $conn->prepare("INSERT INTO procesado_scs3_oxerev (vivienda_scs3_rev, usuario_scs3_rev, monto_scs3_rev, monto_usd_scs3_rev, concepto_scs3_rev, codigo_scs3_rev) VALUES ('$vi', '$usuario', '$n', '$n_usd', '$concepto' , '$crypto')");
            $resultado->execute();

            // ELIMINAR DATO DEL CARGA DEL USUARIO
            $resultado = $conn->prepare("UPDATE pagos_scs1_oxerev SET view_scs1_rev = 0 WHERE id_ref_scs1_rev = '$id_ref'");
            $resultado->execute();

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>Datos Procesados!</strong> Se ha abonado " . number_format($n, 2, ',', '.') . " Bs.D. Deuda acumulada de " . number_format($abot, 2, ',', '.') . " Bs.D </script><i class='fas fa-cloud-upload'></i><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "procesar.php";history.forward();history.pushState(null, "", "procesar.php");},2000);</script>';
            unset($_POST['id']);
            unset($_POST['ab']);
            unset($_POST['co']);
            unset($_POST['usu']);
            unset($_POST['viv']);
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $resultado->closeCursor();
            $conn = null;
        } else {
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error Fatal!</strong> Error {procesar[C01]}.</div>";
            $conn = null;

        }
        break;

    default:
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Algo ha salido mal!</strong> Error {procesar[C02]}.</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        $conn = null;

}

$conn = null;

?>