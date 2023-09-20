<?php

require_once 'config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

// INSERTAR NUEVOS USUARIOS
$nombre = trim(htmlentities(addslashes($_POST['Nom']))) ? $_POST['Nom'] : '';
$correo = trim(htmlentities(addslashes($_POST['Cor']))) ? $_POST['Cor'] : '';
$clave = trim(htmlentities(addslashes($_POST['Cla']))) ? $_POST['Cla'] : '';
$clave_cryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
$usuario = trim(htmlentities(addslashes($_POST['Usu']))) ? $_POST['Usu'] : '';
$rol = 1;


try
{
    if(isset($_POST['Nom']) && isset($_POST['Cor']) && isset($_POST['Cla']) && isset($_POST['Usu'])){

        $query = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo OR  user_scs0_rev = :user_rev");
        $query->execute([':correo' => $correo, ':user_rev' => $usuario]);

        if ($query->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong> pero el correo ó usuario ya existen <i class='fa-solid fa-user-xmark'></i></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
        } else {

                // INGRESO DE DATOS A LA TABLA PADRE USUARIOS
                $verificado = 'Verificado';
                $resultado = $conn->prepare("INSERT INTO usuarios_scs0_oxerev (rol_scs0_rev, nombre_scs0_rev, correo_scs0_rev, clave_scs0_rev, user_scs0_rev, status_scs0_rev) VALUES (:rol, :nombre, :correo, :clave, :user, :status)");
                $resultado->execute(array(":rol" => $rol, ":nombre" => ucwords($nombre), ":correo" => $correo, ":clave" => $clave_cryp, ":user" => $usuario, ":status" => $verificado));

                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Admin Creado!</strong> El usuario fue creado con éxito <i class='fa-solid fa-user-check'></i></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
                echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajuste.php";history.forward();history.pushState(null, "", "ajuste.php");},1000);</script>';

                $resultado->closeCursor();
                unset($_POST['Nom']);
                unset($_POST['Cor']);
                unset($_POST['Cla']);
                unset($_POST['Usu']);
                $conn = null;


                }
    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {insertar_admin[C01]}</strong>, no es posible la operación por violación de parametros <i class='fa-solid fa-user-xmark'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
        $conn = null;
    }

} catch (Exception $e_fatal) {

    die("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {insertar_admin[C02]}</strong> pero ha ocurrido un error inesperado: "  . $e_fatal->getMessage() . "<i class='fa-solid fa-user-xmark'></i></div>");
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    $conn = null;

} finally {

    $conn = null;
}

?>