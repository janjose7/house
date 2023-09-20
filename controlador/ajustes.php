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
    if($clave == ''){
        // ACTUALIZACION DE DATOS DEL USUARIO
        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, correo_scs0_rev = :correo, user_scs0_rev = :usuario  WHERE id_scs0_rev = '$id'");
        $resultado->execute(array(":nombre" => ucwords($nombre), ":correo" => $correo, ":usuario" => $usuario));

        $resultado->closeCursor();
        unset($_POST['nombre']);
        unset($_POST['usuario']);
        unset($_POST['correo']);
        // REDIRECCIONAMIENTO
        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Actualización Exitosa!</strong> Sus datos fueron guardado satisfactoriamente<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1000);</script>';
    } elseif($clave != ''){
        // ACTUALIZACION DE DATOS DEL USUARIO
        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, correo_scs0_rev = :correo, clave_scs0_rev = :clave, user_scs0_rev = :usuario  WHERE id_scs0_rev = '$id'");
        $resultado->execute(array(":nombre" => ucwords($nombre), ":correo" => $correo, ":clave" => $clave_encryp, ":usuario" => $usuario));

        // REDIRECCIONAMIENTO
        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Actualización Exitosa!</strong> Sus datos fueron guardado satisfactoriamente<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1000);</script>';

        $resultado->closeCursor();
        unset($_POST['nombre']);
        unset($_POST['usuario']);
        unset($_POST['correo']);
        unset($_POST['clave']);
    } else{
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {ajustes[C01]}</strong> Ha ocurrido un error, por favor intente nuevamente</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    }

} catch (Exception $e_fatal) {

    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {ajustes[C02]}</strong> Ha ocurrido un error inesperado:" . $e_fatal->getMessage() ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';

} finally {

    $conn = null;
}


?>