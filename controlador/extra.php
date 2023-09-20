<?php

session_start();

require_once 'config.php';
$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

$id_ref = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
$ns = trim(htmlentities(addslashes($_POST['ex']))) ? $_POST['ex'] : 0;
$co = trim(htmlentities(addslashes(ucfirst($_POST['co'])))) ? $_POST['co'] : '';
$usu = trim(htmlentities(addslashes($_POST['usu']))) ? $_POST['usu'] : '';
$viv = trim(htmlentities(addslashes($_POST['viv']))) ? $_POST['viv'] : '';
$mod = trim(htmlentities(addslashes(ucfirst($_POST['mod'])))) ? $_POST['mod'] : '';
$nulo = 0;
$n = round($ns, 2);

//****** Conversión al dólar *****/
$tasa_bd = $conn->prepare("SELECT * FROM tasa_scs13_oxerev WHERE id_scs13_rev = 1");
$tasa_bd->execute();
$tasa_show = $tasa_bd->fetch(PDO::FETCH_OBJ);
$tasa = $tasa_show->tasa_actual_scs13_rev;



switch($n){
    case $n:
        $crypto = bin2hex(random_bytes(3));
        $n_u = $n / $tasa;
        $n_usd = round($n_u, 2);

        $sql = $conn->prepare("INSERT INTO ticket_scs5_oxerev (vivienda_scs5_rev, usuario_scs5_rev, monto_scs5_rev, monto_usd_scs5_rev, metodo_scs5_rev, concepto_scs5_rev, codigo_scs5_rev) VALUES (:viv, :usu, :mon, :mon_usd, :mod, :co, :crypto)");
        $sql->execute(array(":viv" => $viv, ":usu" => $usu, ":mon" => $n, ":mon_usd" => $n_usd, ":mod" => ucfirst($mod), ":co" => ucfirst($co), ":crypto" => $crypto));

        $sql = $conn->prepare("UPDATE extraordinario_scs2_oxerev SET view_scs2_rev = 0 WHERE id_ref_scs2_rev = '$id_ref'");
        $sql->execute();

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Operación exitosa. </script><i class='fas fa-cloud-upload'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "extraordinario.php";history.forward();history.pushState(null, "", "extraordinario.php");},2000);</script>';
        unset($_POST['id']);
        unset($_POST['ex']);
        unset($_POST['co']);
        unset($_POST['usu']);
        unset($_POST['viv']);
        unset($_POST['mod']);
        unset($_SESSION['id_extra']);
        $sql->closeCursor();
        $conn = null;

    break;

    default:
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {extra[C01]}</strong> Su operación no es válida</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
        $conn = null;

}

$conn = null;

?>