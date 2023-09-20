<?php

session_start();

require_once 'config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();


$id = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
$user = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : '';

$sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE id_scs0_rev = '$id'");
$sql->execute();
$show = $sql->fetch(PDO::FETCH_OBJ);
$id_del = $show->id_scs0_rev;
$usuario = $show->user_scs0_rev;

if($_SESSION['op_extra'] == 'usuario'){

    $result_eliminar = $conn->prepare("DELETE FROM usuarios_scs0_oxerev WHERE id_scs0_rev = '$id'");
    $result_eliminar->execute();

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Datos Eliminados con Éxito!</strong> Será redirigido a <strong>Ajustes</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php";history.forward();history.pushState(null, "", "ajustes.php");},800);</script>';

    unset($_SESSION['id_extra']);
    unset($_SESSION['op_extra']);
    unset($_SESSION['us_extra']);
    $result_eliminar->closeCursor();
    $conn = null;

} elseif($_SESSION['op_extra'] == 'administrador'){

    $result_eliminar = $conn->prepare("DELETE FROM usuarios_scs0_oxerev WHERE id_scs0_rev = '$id'");
    $result_eliminar->execute();

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Datos Eliminados con Éxito!</strong> Será redirigido a <strong>Ajustes</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajuste.php";history.forward();history.pushState(null, "", "ajuste.php");},800);</script>';

    unset($_SESSION['id_extra']);
    unset($_SESSION['op_extra']);
    unset($_SESSION['us_extra']);
    $result_eliminar->closeCursor();
    $conn = null;

} else {

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {editar_borrar[C01]}</strong> Ha ocurrido un error al intentar borrar los datos</div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';

    unset($_SESSION['id_extra']);
    unset($_SESSION['op_extra']);
    unset($_SESSION['us_extra']);
    $conn = null;

}

?>