<?php

require_once "config.php";

date_default_timezone_set('America/Caracas');

$inst = new Conexion();
$conn = $inst->Conectar();

$op = trim(htmlentities(addslashes($_POST['form_ifc']))) ? $_POST['form_ifc'] : '';
$nulo = 0;

    switch($op){

        case 's00':
            echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Ups!</strong> Por favor, seleccione una opción válida</div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1500);</script>';
        break;

        case 'apto_pcl':
            // OPCIONES DE MULTA
            $op1pcl = trim(htmlentities(addslashes($_POST['t3']))) ? $_POST['t3'] : 0; // MONTO
            $op2pcl = trim(htmlentities(addslashes($_POST['t1']))) ? $_POST['t1'] : ''; // APTO SELECCIONADO
            $op3pcl = trim(htmlentities(addslashes($_POST['t4']))) ? $_POST['t4'] : 'Deuda Particular'; // CONCEPTO

            $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
            $buscar->execute([':vivienda' => $op2pcl]);

            if($op2pcl == 'Seleccione'){
                echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Seleccione una vivienda para operar <i class='fas fa-cloud'></i></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

            } elseif(!$buscar->fetchColumn()){
                echo "<div class='alert alert-danger' role='alert'>La vivienda introducida <strong>No Existe</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

            } else {
                // MOSTRANDO DATOS DE DEUDA DEL PROPIETARIO
                $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$op2pcl'");
                $sql->execute();
                $show = $sql->fetch(PDO::FETCH_ASSOC);
                $no = $show['nombre_scs0_rev'];
                $vi = $show['vivienda_scs0_rev'];
                $ac = $show['actual_oxe'];
                $de = $show['deuda_oxe'];
                $ab = $show['abono_oxe'];
                $to = $show['total_oxe'];
    
                $muld = $op1pcl + $de; // DEUDA + UT
                $mult = $op1pcl + $to; // TOTAL DE DEUDA + UT
                $mulr = $ab - $op1pcl; // RESTA DE MULTA CON EL ABONADO
    
                if($mulr > 0 && $ab >= 0.01){ // RESTANDO ABONO Y AGREGANDO EL RESTANTE EN LA DEUDA
                    // QUERY SQL
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$op2pcl'");
                    $resultado->execute(array(":deuda" => $nulo, ":abono" => $mulr, ":total" => $nulo));
    
                    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong>, de la vivienda <strong>$vi</strong>, se le cargó <strong>" . number_format($op1pcl, 1, ',', '.') . " Bs.D. <i class='fas fa-cloud-upload'></i></div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                    $conn = null;
    
                    } elseif($mulr < 0 && $ab >= 0.01){ // RESTANDO ABONO Y AGREGANDO EL RESTANTE EN LA DEUDA Ó NO
                        $resultadom = abs($mulr);
                        $total_m_d = $resultadom + $de;
                        $total_m_t = $resultadom + $to;
                        // QUERY SQL
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$op2pcl'");
                        $resultado->execute(array(":deuda" => $total_m_d, ":abono" => $nulo, ":total" => $total_m_t));
    
                        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong> de la vivienda <strong>$vi</strong>, se le cargó <strong>" . number_format($op1pcl, 1, ',', '.') . " Bs.D. <i class='fas fa-cloud-upload'></i></div>";
                        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                        $conn = null;
    
                    } else { // NO EXISTE ABONO Y SOLO SE LE SUMA A LA DEUDA
                        // QUERY SQL
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, total_oxe = :total WHERE vivienda_scs0_rev = '$op2pcl'");
                        $resultado->execute(array(":deuda" => $muld, ":total" => $mult));
    
                        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong> de la vivienda <strong>$vi</strong>, se le cargó <strong>" . number_format($op1pcl, 1, ',', '.') . " Bs.D, obteniendo una deuda total de " . number_format($mult, 2, ',', '.') . " Bs.D <i class='fas fa-cloud-upload'></i></div>";
                        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                        $conn = null;
    
                    }
            }
            $conn = null;
        break;

        case 'multa':
            // OPCIONES DE MULTA
            $op1mlt = trim(htmlentities(addslashes($_POST['t0']))) ? $_POST['t0'] : 0; // MONTO
            $op2mlt = trim(htmlentities(addslashes($_POST['t1']))) ? $_POST['t1'] : ''; // APTO SELECCIONADO
            $op3mlt = trim(htmlentities(addslashes($_POST['t2']))) ? $_POST['t2'] : 'Multa por incumplimiento del reglamento'; // CONCEPTO

            // MOSTRANDO DATOS DE DEUDA DEL PROPIETARIO
            $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$op2mlt'");
            $sql->execute();
            $show = $sql->fetch(PDO::FETCH_ASSOC);
            $no = $show['nombre_scs0_rev'];
            $vi = $show['vivienda_scs0_rev'];
            $ac = $show['actual_oxe'];
            $de = $show['deuda_oxe'];
            $ab = $show['abono_oxe'];
            $to = $show['total_oxe'];
            $rol = $show['rol_scs0_rev'];

            $buscar = $conn->prepare("SELECT COUNT(*) FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = :vivienda");
            $buscar->execute([':vivienda' => $op2mlt]);

            if($op2mlt == 'Seleccione'){
                echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Seleccione una vivienda para operar <i class='fas fa-cloud'></i></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

            } elseif(!$buscar->fetchColumn()){
                echo "<div class='alert alert-danger' role='alert'>La vivienda introducida no existe</div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';

            } else {
                // MOSTRANDO DATOS DE DEUDA DEL PROPIETARIO
                $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$op2mlt'");
                $sql->execute();
                $show = $sql->fetch(PDO::FETCH_ASSOC);
                $no = $show['nombre_scs0_rev'];
                $vi = $show['vivienda_scs0_rev'];
                $ac = $show['actual_oxe'];
                $de = $show['deuda_oxe'];
                $ab = $show['abono_oxe'];
                $to = $show['total_oxe'];

                $mul = ($op1mlt * 50.41); // UNIDAD TRIBUTARIA
                $muld = $mul + $de; // DEUDA + UT
                $mult = $mul + $to; // TOTAL DE DEUDA + UT
                $mulr = $ab - $mul; // RESTA DE MULTA CON EL ABONADO

                if($mulr > 0 && $ab >= 0.01){ // RESTANDO ABONO Y AGREGANDO EL RESTANTE EN LA DEUDA
                    // QUERY SQL
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$op2mlt'");
                    $resultado->execute(array(":deuda" => $nulo, ":abono" => $mulr, ":total" => $nulo));

                    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong> de la vivienda <strong>$vi</strong>, multa de <strong>" . number_format($op1mlt, 1, ',', '.') . " U.T</strong>, por valor de " . number_format($mul, 2, ',', '.') . " Bs.D. <i class='fas fa-cloud-upload'></i></div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                    $conn = null;

                } elseif($mulr < 0 && $ab >= 0.01){ // RESTANDO ABONO Y AGREGANDO EL RESTANTE EN LA DEUDA Ó NO
                    $resultadom = abs($mulr);
                    $total_m_d = $resultadom + $de;
                    $total_m_t = $resultadom + $to;
                    // QUERY SQL
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE vivienda_scs0_rev = '$op2mlt'");
                    $resultado->execute(array(":deuda" => $total_m_d, ":abono" => $nulo, ":total" => $total_m_t));

                    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong> de la vivienda <strong>$vi</strong>, multa de <strong>" . number_format($op1mlt, 1, ',', '.') . " U.T</strong>, por valor de " . number_format($mul, 2, ',', '.') . " Bs.D. <i class='fas fa-cloud-upload'></i></div>";
                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                    $conn = null;

                } else { // NO EXISTE ABONO Y SOLO SE LE SUMA A LA DEUDA
                    // QUERY SQL
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET deuda_oxe = :deuda, total_oxe = :total WHERE vivienda_scs0_rev = '$op2mlt'");
                    $resultado->execute(array(":deuda" => $muld, ":total" => $mult));

                    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Procesados!</strong> Propietario <strong>$no</strong> de la vivienda <strong>$vi</strong>, multa de <strong>" . number_format($op1mlt, 1, ',', '.') . " U.T</strong>, ó un valor de " . number_format($mul, 2, ',', '.') . " Bs.D<i class='fas fa-cloud-upload'></i></div>";

                    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1400);</script>';
                    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php"; history.forward(); history.pushState(null, "", "index.php");},1500);</script>';
                    $conn = null;
                }
            }
        break;

        default:
            echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Acción no válida!</strong></div>";
            echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000);</script>';
            $conn = null;
    }
    $conn = null;

?>