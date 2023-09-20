<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';

$instancia_conn = new Conexion();
$conn = $instancia_conn->Conectar();

$vivienda_rev = $_SESSION['rev_vivienda'];
$correo_rev = $_SESSION['rev_correo'];
$nombre_rev = $_SESSION['rev_conectado'];

$op = trim(htmlentities(addslashes($_POST['form_solicitud']))) ? $_POST['form_solicitud'] : '';
$crypto = bin2hex(random_bytes(3));

switch($op){
    case 's0':
        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> Por favor, seleccione una opción válida</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
    break;

    case 'parque':
        // OPCIONES DEL ALQUILER
        $op1a = trim(htmlentities(addslashes($_POST['aq1']))) ? $_POST['aq1'] : ''; // FECHA
        $op2a = trim(htmlentities(addslashes($_POST['aq2']))) ? $_POST['aq2'] : 'Pago por Alquiler del Parque'; // COMENTARIO

        $query = $conn->prepare("SELECT * FROM alquiler_scs6_oxerev WHERE status_scs6_rev = 'Aprobado' AND fecha_scs6_rev = :fecha");
        $query->execute(array(":fecha" => $op1a));
        // RESULTADO DE FECHAS
        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if($op1a < date("Y-m-d")){
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Seleccione una fecha válida</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        } else{
            if($resultado){
                echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Fecha Reservada</strong>!</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';

            } elseif(!$resultado){
                $query = $conn->prepare("SELECT * FROM alquiler_scs6_oxerev WHERE status_scs6_rev = 'Pendiente' AND fecha_scs6_rev = :fecha");
                $query->execute(array(":fecha" => $op1a));
                // RESULTADO DE FECHAS
                $resultado = $query->fetch(PDO::FETCH_ASSOC);

                if($resultado){
                    echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Fecha en espera de pago!</strong> Intente con otra fecha</div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';

                } elseif(!$resultado){
                    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Fecha Disponible!</strong> <span class='icon text-success-50'><i class='fas fa-calendar-alt'></i></span></div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000); setTimeout(function(){window.location.href = "extraordinario.php";history.forward();history.pushState(null, "", "extraordinario.php");},1000);</script>';


                    $_SESSION['alquilerParque'] = $op2a;
                    $_SESSION['fechaParque'] = $op1a;
                    $conn = null;
                } else {
                    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C01]}</div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
                }
            }
        }
    break;

    case 'residencia':
        // OPCIONES DE CARTA DE RESIDENCIA
        $op1cr = trim(htmlentities(addslashes($_POST['rs1']))) ? $_POST['rs1'] : ''; // CEDULA
        $op2cr = trim(htmlentities(addslashes($_POST['rs2']))) ? $_POST['rs2'] : ''; // ANTIGÜEDAD
        $op3cr = trim(htmlentities(addslashes($_POST['rs3']))) ? $_POST['rs3'] : ''; // PISO
        $op4cr = trim(htmlentities(addslashes($_POST['rs4']))) ? $_POST['rs4'] : 'Constancia de Residencia'; // MEMBRETE

        if($op1cr == '' || $op2cr == '' || $op3cr == '' || $op3cr == 'P0'){
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Por favor, rellene el formulario para procesar la solicitud</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';

        } elseif($op1cr != '' || $op2cr != '' || $op2cr != 0){
            if($op3cr <= 0 || $op3cr >= 4){
                echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Su acción no es válida</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            } elseif($op3cr >= 0 || $op3cr <= 3){
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud Exitosa!</strong> Por favor, realice el pago correspondiente</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
                echo '<script type="text/javascript">setTimeout(function(){window.location.href = "extraordinario.php";history.forward();history.pushState(null, "", "extraordinario.php");},1000);</script>';

            $_SESSION['cedula'] = $op1cr; // CEDULA
            $_SESSION['antiguedad'] = $op2cr; //ANTIGÜEDAD
            $_SESSION['piso'] = $op3cr; //PISO
            $_SESSION['membrete'] = $op4cr; //MEMBRETE
            $_SESSION['cartaResidencia'] = 'Pago por Carta de Residencia';
            $conn = null;
            }
        } else {
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C02]}</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        }
    break;

    case 'solvencia':
        // OPNCIONES DE CARTA DE SOLVENCIA
        $op1cs = trim(htmlentities(addslashes($_POST['sv1']))) ? $_POST['sv1'] : 'Solicitud de Solvencia'; // COMENTARIO

        if($op1cs == ''){
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Debe rellenar el formulario para procesar la solicitud</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';

        } elseif($op1cs != ''){
            $buscar = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
            $buscar->execute(array(":vivienda" => $vivienda_rev));
            $mostrar = $buscar->fetch(PDO::FETCH_OBJ);
            $deuda = $mostrar->total_oxe;
            if($deuda != 0){
                echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Usted posee una deuda y por esa razón no puede solicitar la solvencia</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';

            } elseif($deuda == 0){
                $insertar = $conn->prepare("INSERT INTO solvencia_scs8_oxerev (vivienda_scs8_rev, correo_scs8_rev, nombre_scs8_rev, comentario_scs8_rev, codigo_scs8_rev) VALUES (:vivienda, :correo, :nombre, :comentario, :codigo)");
                $insertar->execute(array(":vivienda" => $vivienda_rev, ":correo" => $correo_rev, ":nombre" => $nombre_rev, ":comentario" => ucfirst($op1cs), ":codigo" => $crypto));

                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud Exitosa!</strong> Su Carta de Solvencia será enviada por correo electrónico</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
                echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'index.php';history.forward();history.pushState(null, '', 'index.php');},1500);</script>";
                unset($op1cs);
                $conn = null;

            } else {
                echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C03]}</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
            }


        } else {
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C04]}</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        }

    break;

    case 'mudanza':
        // OPCIONES DE MUDANZA
        $op1cm = trim(htmlentities(addslashes($_POST['mz1']))) ? $_POST['mz1'] : ''; // FECHA
        $op2cm = trim(htmlentities(addslashes($_POST['mz2']))) ? $_POST['mz2'] : 'Solicitud para Permiso de Mudanza'; // COMENTARIO
        $status = 'Pendiente';

        if($op1cm == '' || $op2cm == ''){
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Seleccione una fecha y agregue un comentario sí cree necesario</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';

        } elseif($op1cm != '' || $op2cm != ''){
            $insertar = $conn->prepare("INSERT INTO mudanza_scs9_oxerev (vivienda_scs9_rev, correo_scs9_rev, nombre_scs9_rev, comentario_scs9_rev, status_scs9_rev, codigo_scs9_rev, fecha_scs9_rev) VALUES (:vivienda, :correo, :nombre, :comentario, :status, :codigo, :fecha)");
            $insertar->execute(array(":vivienda" => $vivienda_rev, ":correo" => $correo_rev, ":nombre" => $nombre_rev, ":comentario" => ucwords($op2cm), ":status" => $status, ":codigo" => $crypto, ":fecha" => $op1cm));

            echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Solicitud Exitosa!</strong> La Carta de Mudanza se le enviará por correo electrónico</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
            echo "<script type='text/javascript'>setTimeout(function(){window.location.href = 'index.php';history.forward();history.pushState(null, '', 'index.php');},1500);</script>";
            unset($op1cm);
            unset($op2cm);
            $conn = null;

        } else {
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C05]}</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        }
    break;

    default:
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Error!</strong> Error {ssu[C06]}</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        $conn = null;
}
$conn = null;
?>
