<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';

$instancia_tablas = new Conexion();
$conn = $instancia_tablas->Conectar();

$id = $_SESSION['rev_id'];
$nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : "";
$usuario = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : "";
$correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : "";
$clave = trim(htmlentities(addslashes($_POST['clave']))) ? $_POST['clave'] : "";
$clave_encryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));

try {
    $data = $conn->prepare("DELETE FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo'");
    $data->execute();

    $data->closeCursor();
    unset($_POST['nombre']);
    unset($_POST['usuario']);
    unset($_POST['correo']);
    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Borrado Exitoso!</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "../controlador/out.php";history.forward();history.pushState(null, "", "../controlador/out.php");},10);</script>';

} catch (Exception $e_fatal) {

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {ajustes_delete[C01]}</strong> Ha ocurrido un error inesperado:" . $e_fatal->getMessage() ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';

} finally {

    $conn = null;

}


?>