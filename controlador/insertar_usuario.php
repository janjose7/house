<?php

require_once 'config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

// INSERTAR NUEVOS USUARIOS
$nombre = trim(htmlentities(addslashes($_POST['Nom']))) ? $_POST['Nom'] : '';
$vivienda = trim(htmlentities(addslashes($_POST['Viv']))) ? $_POST['Viv'] : '';
$correo = trim(htmlentities(addslashes($_POST['Cor']))) ? $_POST['Cor'] : '';
$clave = trim(htmlentities(addslashes($_POST['Cla']))) ? $_POST['Cla'] : '';
$clave_cryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
$usuario = trim(htmlentities(addslashes($_POST['Usu']))) ? $_POST['Usu'] : '';
$copropietario = trim(htmlentities(addslashes($_POST['Copro'])));
$rol = 2;

try
{
    if(isset($_POST['Nom']) && isset($_POST['Cor']) && isset($_POST['Cla']) && isset($_POST['Usu'])){

        $query = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo OR  user_scs0_rev = :user_rev");
        $query->execute([':correo' => $correo, ':user_rev' => $usuario]);

        if ($query->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong> pero el correo ó usuario ya existen <i class='fa-solid fa-user-xmark'></i></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
        } else {

                // INGRESO DE DATOS A LA TABLA PADRE USUARIOS
                $verificado = 'Verificado';
                $resultado = $conn->prepare("INSERT INTO usuarios_scs0_oxerev (rol_scs0_rev, pro_in_scs0_rev, nombre_scs0_rev, vivienda_scs0_rev, correo_scs0_rev, clave_scs0_rev, user_scs0_rev, status_scs0_rev) VALUES (:rol, :pro_in, :nombre, :vivienda, :correo, :clave, :user, :status)");
                $resultado->execute(array(":rol" => $rol, ":pro_in" => $copropietario, ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => $correo, ":clave" => $clave_cryp, ":user" => $usuario, ":status" => $verificado));


                // INGRESO DE DATOS A LA TABLA HIJA EXTRAORDINARIO
                $resultado2 = $conn->prepare("INSERT INTO extraordinario_scs2_oxerev (datae_vivienda_scs2_rev) VALUES (:vivienda)");
                $resultado2->execute(array(":vivienda" => $vivienda));


                // INGRESO DE DATOS A LA TABLA HIJA PAGOS
                $resultado3 = $conn->prepare("INSERT INTO pagos_scs1_oxerev (datap_vivienda_scs1_rev) VALUES (:vivienda)");
                $resultado3->execute(array(":vivienda" => $vivienda));

                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Usuario Creado!</strong> El usuario fue creado con éxito <i class='fa-solid fa-user-check'></i></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
                echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php"; history.forward(); history.pushState(null, "", "ajustes.php");},1000);</script>';

                $resultado->closeCursor();
                $resultado2->closeCursor();
                $resultado3->closeCursor();
                unset($_POST['Nom']);
                unset($_POST['Cor']);
                unset($_POST['Cla']);
                unset($_POST['Usu']);
                $conn = null;
                }
    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {insertar_usuario[C01]}</strong>, no es posible realizar la operación por violación de parametros <i class='fa-solid fa-user-xmark'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
        $conn = null;
    }

} catch (Exception $e_fatal) {

    die("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {insertar_usuario[C02]}</strong> pero ha ocurrido un error inesperado: "  . $e_fatal->getMessage() . "<i class='fa-solid fa-user-xmark'></i></div>");
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
    $conn = null;

} finally {

    $conn = null;
}

?>