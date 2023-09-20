<?php

session_start();

require_once 'config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

if($_SESSION['op_extra'] == 'administrador'){
    if($_POST["clave"] != ''){

        $id = trim(htmlentities(addslashes($_POST["id"]))) ? $_POST['id'] : '';
        $nombre = trim(htmlentities(addslashes($_POST["nombre"]))) ? $_POST['nombre'] : '';
        $correo = trim(htmlentities(addslashes($_POST["correo"]))) ? $_POST['correo'] : '';
        $clave = trim(htmlentities(addslashes($_POST["clave"]))) ? $_POST['clave'] : '';
        $clave_encryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
        $usuario = trim(htmlentities(addslashes($_POST["usuario"]))) ? $_POST['usuario'] : '';

        $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, correo_scs0_rev = :correo, clave_scs0_rev = :clave, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
        $result->execute(array(":idOxe" => $id, ":nombre" => ucwords($nombre), ":correo" => $correo, ":clave" => $clave_encryp, ":usuario" => $usuario));

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajuste.php";history.forward();history.pushState(null, "", "ajuste.php");},2000);</script>';
        $result->closeCursor();
        unset($_SESSION['id_extra']);
        unset($_SESSION['op_extra']);
        $conn = null;

    } elseif($_POST['clave'] == ''){

        $id = trim(htmlentities(addslashes($_POST["id"]))) ? $_POST['id'] : '';
        $nombre = trim(htmlentities(addslashes($_POST["nombre"]))) ? $_POST['nombre'] : '';
        $correo = trim(htmlentities(addslashes($_POST["correo"]))) ? $_POST['correo'] : '';
        $usuario = trim(htmlentities(addslashes($_POST["usuario"]))) ? $_POST['usuario'] : '';

        $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, correo_scs0_rev = :correo, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
        $result->execute(array(":idOxe" => $id, ":nombre" => ucwords($nombre), ":correo" => $correo, ":usuario" => $usuario));

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajuste.php";history.forward();history.pushState(null, "", "ajuste.php");},2000);</script>';
        $result->closeCursor();
        unset($_SESSION['id_extra']);
        unset($_SESSION['op_extra']);
        $conn = null;

    } else {

        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {edit[C01]}</strong> Ha ocurrido un error al intentar actualizar los datos<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        unset($_SESSION['id_extra']);
        unset($_SESSION['op_extra']);
        $conn = null;

    }
} elseif($_SESSION['op_extra'] == 'usuario'){
    if($_POST['clave'] != '' && $_POST['person'] != 'Seleccione'){

        $id = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
        $o =  trim(htmlentities(addslashes($_POST['person']))) ? $_POST['person'] : '';
        $nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : '';
        $vivienda = trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : '';
        $clave = trim(htmlentities(addslashes($_POST['clave']))) ? $_POST['clave'] : '';
        $clave_encryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
        $usuario = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : '';
    
        // VERIFICAR SÍ LA VIVIENDA EXISTE
        $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
        $buscar->execute([':vivienda' => $vivienda]);
        if(!$buscar->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> La vivienda $vivienda no existe</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';
    
        } else {
    
            $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET pro_in_scs0_rev = :in_viv, nombre_scs0_rev = :nombre, vivienda_scs0_rev = :vivienda, correo_scs0_rev = :correo, clave_scs0_rev = :clave, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
            $result->execute(array(":idOxe" => $id, ":in_viv" => $o, ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => $correo, ":clave" => $clave_encryp, ":usuario" => $usuario));
    
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados</button></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php";history.forward();history.pushState(null, "", "ajustes.php");},2000);</script>';
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $result->closeCursor();
            $conn = null;
    
        }
    
    } elseif ($_POST['clave'] != ''){
    
        $id = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
        $nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : '';
        $vivienda = trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : '';
        $clave = trim(htmlentities(addslashes($_POST['clave']))) ? $_POST['clave'] : '';
        $clave_encryp = password_hash($clave, PASSWORD_DEFAULT, array("cost" => 11));
        $usuario = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : '';
    
        // VERIFICAR SÍ LA VIVIENDA EXISTE
        $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
        $buscar->execute([':vivienda' => $vivienda]);
        if(!$buscar->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> La vivienda $vivienda no existe</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    
        } else {
    
            $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, vivienda_scs0_rev = :vivienda, correo_scs0_rev = :correo, clave_scs0_rev = :clave, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
            $result->execute(array(":idOxe" => $id, ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => $correo, ":clave" => $clave_encryp, ":usuario" => $usuario));
    
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php";history.forward();history.pushState(null, "", "ajustes.php");},2000);</script>';
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $result->closeCursor();
            $conn = null;
    
        }
    
    } elseif($_POST['person'] != 'Seleccione'){
    
        $id = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
        $o =  trim(htmlentities(addslashes($_POST['person']))) ? $_POST['person'] : '';
        $nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : '';
        $vivienda = trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : '';
        $usuario = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : '';
    
        // VERIFICAR SÍ LA VIVIENDA EXISTE
        $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
        $buscar->execute([':vivienda' => $vivienda]);
        if(!$buscar->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> La vivienda $vivienda no existe</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    
        } else {
    
            $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET pro_in_scs0_rev = :in_viv, nombre_scs0_rev = :nombre, vivienda_scs0_rev = :vivienda, correo_scs0_rev = :correo, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
            $result->execute(array(":idOxe" => $id, ":in_viv" => $o, ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => $correo, ":usuario" => $usuario));
    
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php";history.forward();history.pushState(null, "", "ajustes.php");},2000);</script>';
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $result->closeCursor();
            $conn = null;
    
        }
    
    } elseif($_POST['nombre'] != '' && $_POST['usuario'] != '' && $_POST['correo'] != '' && $_POST['vivienda'] != '') {
    
        $id = trim(htmlentities(addslashes($_POST['id']))) ? $_POST['id'] : '';
        $nombre = trim(htmlentities(addslashes($_POST['nombre']))) ? $_POST['nombre'] : '';
        $vivienda = trim(htmlentities(addslashes($_POST['vivienda']))) ? $_POST['vivienda'] : '';
        $correo = trim(htmlentities(addslashes($_POST['correo']))) ? $_POST['correo'] : '';
        $usuario = trim(htmlentities(addslashes($_POST['usuario']))) ? $_POST['usuario'] : '';
    
        // VERIFICAR SÍ LA VIVIENDA EXISTE
        $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
        $buscar->execute([':vivienda' => $vivienda]);
        if(!$buscar->fetchColumn())
        {
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> La vivienda $vivienda no existe</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    
        } else {
    
            $result = $conn->prepare("UPDATE usuarios_scs0_oxerev SET nombre_scs0_rev = :nombre, vivienda_scs0_rev = :vivienda, correo_scs0_rev = :correo, user_scs0_rev = :usuario WHERE id_scs0_rev = :idOxe");
            $result->execute(array(":idOxe" => $id, ":nombre" => ucwords($nombre), ":vivienda" => $vivienda, ":correo" => $correo, ":usuario" => $usuario));
    
            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Actualizados con Éxito!</strong> En breve podrá visualizar los cambios realizados</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ajustes.php";history.forward();history.pushState(null, "", "ajustes.php");},2000);</script>';
            unset($_SESSION['id_extra']);
            unset($_SESSION['op_extra']);
            $result->closeCursor();
            $conn = null;
    
        }
    
    } else{
    
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {editar[C01]}</strong> Ha ocurrido un error al intentar actualizar los datos</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
        $conn = null;
    
    }
}

?>