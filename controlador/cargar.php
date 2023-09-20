<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once "config.php";
$inst = new Conexion();
$conn = $inst->Conectar();


//************** EXTRACCION DE LA TASA DEL DOLAR DEL DÍA ***************/
$tasa_bd = $conn->prepare("SELECT * FROM tasa_scs13_oxerev ORDER BY id_scs13_rev DESC");
$tasa_bd->execute();
$tasa_show = $tasa_bd->fetch(PDO::FETCH_OBJ);
$tasa = $tasa_show->tasa_actual_scs13_rev;

//**** MOSTRAR DATOS DEL CONJUNTO, RESIDENCIA, TORRES, COUNTRY, ENTRE OTROS ****/
$resi = $conn->prepare("SELECT * FROM residencia_scsxx_oxerev WHERE id_ref_scsxx_rev = 1");
$resi->execute();
$residencia = $resi->fetch(PDO::FETCH_OBJ);
$resident = $residencia->residencia_scsxx_rev;
$nombre = $residencia->nombre_scsxx_rev;
$rif = $residencia->rif_scsxx_rev;
$direccion = $residencia->direccion_scsxx_rev;
//**** /MOSTRAR DATOS DEL CONJUNTO, RESIDENCIA, TORRES, COUNTRY, ENTRE OTROS ****/

//************************ FORMATEO DE FECHA***********************/
function fechaTraducida($fecha)
{
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anno = date('Y', strtotime($fecha));

    $diasEs = array('lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado', 'domingo');
    $diasEn = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $nombreDia = str_replace($diasEn, $diasEs, $dia);
    $mesesEs = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $mesesEn = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $nombreMes = str_replace($mesesEn, $mesesEs, $mes);

    return 'Pagar antes del ' . $nombreDia . ' ' . $numeroDia . ' ' . $nombreMes . ' de ' . $anno;
}

//******************** VARIABLE DE LA FECHA ****************/
$fecha = date('Y-m-d H:i', strtotime(date('Y-m-d H:i', strtotime(date('f'))) . '+ 7 day'));

//********************** NÚMERO DE USUARIOS/CLIENTES ********************/
$query = $conn->prepare("SELECT COUNT(DISTINCT vivienda_scs0_rev) FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2 AND correo_scs0_rev != ''");
$query->execute();
$contador = $query->fetchColumn();

//**************************** CIFRAS **************************/
$x0 = trim(htmlentities(addslashes($_POST['t0']))) ? $_POST['t0'] : 0;
$x1 = trim(htmlentities(addslashes($_POST['t1']))) ? $_POST['t1'] : 0;
$x2 = trim(htmlentities(addslashes($_POST['t2']))) ? $_POST['t2'] : 0;
$x3 = trim(htmlentities(addslashes($_POST['t3']))) ? $_POST['t3'] : 0;
$x4 = trim(htmlentities(addslashes($_POST['t4']))) ? $_POST['t4'] : 0;
$x5 = trim(htmlentities(addslashes($_POST['t5']))) ? $_POST['t5'] : 0;
$x6 = trim(htmlentities(addslashes($_POST['t6']))) ? $_POST['t6'] : 0;
$x7 = trim(htmlentities(addslashes($_POST['t7']))) ? $_POST['t7'] : 0;
$x8 = trim(htmlentities(addslashes($_POST['t8']))) ? $_POST['t8'] : 0;
$x9 = trim(htmlentities(addslashes($_POST['t9']))) ? $_POST['t9'] : 0;
$x10 = trim(htmlentities(addslashes($_POST['t10']))) ? $_POST['t10'] : 0;
$x11 = trim(htmlentities(addslashes($_POST['t11']))) ? $_POST['t11'] : 0;
$x12 = trim(htmlentities(addslashes($_POST['t12']))) ? $_POST['t12'] : 0;
$x13 = trim(htmlentities(addslashes($_POST['t13']))) ? $_POST['t13'] : 0;
$x14 = trim(htmlentities(addslashes($_POST['t14']))) ? $_POST['t14'] : 0;
$x15 = trim(htmlentities(addslashes($_POST['t15']))) ? $_POST['t15'] : 0;
$x16 = trim(htmlentities(addslashes($_POST['t16']))) ? $_POST['t16'] : 0;
$x17 = trim(htmlentities(addslashes($_POST['t17']))) ? $_POST['t17'] : 0;
$x18 = trim(htmlentities(addslashes($_POST['t18']))) ? $_POST['t18'] : 0;
$x19 = trim(htmlentities(addslashes($_POST['t19']))) ? $_POST['t19'] : 0;

//************************** COCEPTOS ****************************/
$tt0 = trim(htmlentities(addslashes($_POST['tt0']))) ? $_POST['tt0'] : '';
$tt1 = trim(htmlentities(addslashes($_POST['tt1']))) ? $_POST['tt1'] : '';
$tt2 = trim(htmlentities(addslashes($_POST['tt2']))) ? $_POST['tt2'] : '';
$tt3 = trim(htmlentities(addslashes($_POST['tt3']))) ? $_POST['tt3'] : '';
$tt4 = trim(htmlentities(addslashes($_POST['tt4']))) ? $_POST['tt4'] : '';
$tt5 = trim(htmlentities(addslashes($_POST['tt5']))) ? $_POST['tt5'] : '';
$tt6 = trim(htmlentities(addslashes($_POST['tt6']))) ? $_POST['tt6'] : '';
$tt7 = trim(htmlentities(addslashes($_POST['tt7']))) ? $_POST['tt7'] : '';
$tt8 = trim(htmlentities(addslashes($_POST['tt8']))) ? $_POST['tt8'] : '';
$tt9 = trim(htmlentities(addslashes($_POST['tt9']))) ? $_POST['tt9'] : '';
$tt10 = trim(htmlentities(addslashes($_POST['tt10']))) ? $_POST['tt10'] : '';
$tt11 = trim(htmlentities(addslashes($_POST['tt11']))) ? $_POST['tt11'] : '';
$tt12 = trim(htmlentities(addslashes($_POST['tt12']))) ? $_POST['tt12'] : '';
$tt13 = trim(htmlentities(addslashes($_POST['tt13']))) ? $_POST['tt13'] : '';
$tt14 = trim(htmlentities(addslashes($_POST['tt14']))) ? $_POST['tt14'] : '';
$tt15 = trim(htmlentities(addslashes($_POST['tt15']))) ? $_POST['tt15'] : '';
$tt16 = trim(htmlentities(addslashes($_POST['tt16']))) ? $_POST['tt16'] : '';
$tt17 = trim(htmlentities(addslashes($_POST['tt17']))) ? $_POST['tt17'] : '';
$tt18 = trim(htmlentities(addslashes($_POST['tt18']))) ? $_POST['tt18'] : '';
$tt19 = trim(htmlentities(addslashes($_POST['tt19']))) ? $_POST['tt19'] : '';

//************************* CIFRAS DE NO COMÚN *********************/
$x0_nc = trim(htmlentities(addslashes($_POST['t0_nc']))) ? $_POST['t0_nc'] : 0;
$x1_nc = trim(htmlentities(addslashes($_POST['t1_nc']))) ? $_POST['t1_nc'] : 0;
$x2_nc = trim(htmlentities(addslashes($_POST['t2_nc']))) ? $_POST['t2_nc'] : 0;
$x3_nc = trim(htmlentities(addslashes($_POST['t3_nc']))) ? $_POST['t3_nc'] : 0;
$x4_nc = trim(htmlentities(addslashes($_POST['t4_nc']))) ? $_POST['t4_nc'] : 0;
$x5_nc = trim(htmlentities(addslashes($_POST['t5_nc']))) ? $_POST['t5_nc'] : 0;
$x6_nc = trim(htmlentities(addslashes($_POST['t6_nc']))) ? $_POST['t6_nc'] : 0;
$x7_nc = trim(htmlentities(addslashes($_POST['t7_nc']))) ? $_POST['t7_nc'] : 0;
$x8_nc = trim(htmlentities(addslashes($_POST['t8_nc']))) ? $_POST['t8_nc'] : 0;
$x9_nc = trim(htmlentities(addslashes($_POST['t9_nc']))) ? $_POST['t9_nc'] : 0;

//************************* COCEPTOS DE NO COMÚN **********************/
$tt0_nc = trim(htmlentities(addslashes($_POST['tt0_nc']))) ? $_POST['tt0_nc'] : '';
$tt1_nc = trim(htmlentities(addslashes($_POST['tt1_nc']))) ? $_POST['tt1_nc'] : '';
$tt2_nc = trim(htmlentities(addslashes($_POST['tt2_nc']))) ? $_POST['tt2_nc'] : '';
$tt3_nc = trim(htmlentities(addslashes($_POST['tt3_nc']))) ? $_POST['tt3_nc'] : '';
$tt4_nc = trim(htmlentities(addslashes($_POST['tt4_nc']))) ? $_POST['tt4_nc'] : '';
$tt5_nc = trim(htmlentities(addslashes($_POST['tt5_nc']))) ? $_POST['tt5_nc'] : '';
$tt6_nc = trim(htmlentities(addslashes($_POST['tt6_nc']))) ? $_POST['tt6_nc'] : '';
$tt7_nc = trim(htmlentities(addslashes($_POST['tt7_nc']))) ? $_POST['tt7_nc'] : '';
$tt8_nc = trim(htmlentities(addslashes($_POST['tt8_nc']))) ? $_POST['tt8_nc'] : '';
$tt9_nc = trim(htmlentities(addslashes($_POST['tt9_nc']))) ? $_POST['tt9_nc'] : '';

//******* EGRESOS ***********/
$egs_rsv = trim(htmlentities(addslashes($_POST['RSV']))) ? $_POST['RSV'] : 0;
$egs_pst = trim(htmlentities(addslashes($_POST['PST']))) ? $_POST['PST'] : 0;

//**************** CIFRAS POR COPROPIETARIOS **********/
$x0_d = $x0 / 568; //$contador
$x1_d = $x1 / 568; //$contador
$x2_d = $x2 / 568; //$contador
$x3_d = $x3 / 568; //$contador
$x4_d = $x4 / 568; //$contador
$x5_d = $x5 / 568; //$contador
$x6_d = $x6 / 568; //$contador
$x7_d = $x7 / 568; //$contador
$x8_d = $x8 / 568; //$contador
$x9_d = $x9 / 568; //$contador
$x10_d = $x10 / 568; //$contador
$x11_d = $x11 / 568; //$contador
$x12_d = $x12 / 568; //$contador
$x13_d = $x13 / 568; //$contador
$x14_d = $x14 / 568; //$contador
$x15_d = $x15 / 568; //$contador
$x16_d = $x16 / 568; //$contador
$x17_d = $x17 / 568; //$contador
$x18_d = $x18 / 568; //$contador
$x19_d = $x19 / 568; //$contador

//********* EDIFICIO SELECCIONADO PARA CARGA NO COMÚN ********/
$edif_nc = trim(htmlentities(addslashes($_POST['t_nc'])));

//************************** BOTÓN SWITCH *********************/
$switch = isset($_POST['flexSwitch']) ? $_POST['flexSwitch'] : 'off';

//**************** SUMATORIA DE GASTOS *************/
$op_sum = $x0 + $x1 + $x2 + $x3 + $x4 + $x5 + $x6 + $x7 + $x8 + $x9 + $x10 + $x11 + $x12 + $x13 + $x14 + $x15 + $x16 + $x17 + $x18 + $x19;

//************ SUMATORIA TOTAL DEL RECIBO EN LA PARTE INFERIOR ************/
$sum_pro = $x0_d + $x1_d + $x2_d + $x3_d + $x4_d + $x5_d + $x6_d + $x7_d + $x8_d + $x9_d + $x10_d + $x11_d + $x12_d + $x13_d + $x14_d + $x15_d + $x16_d + $x17_d + $x18_d + $x19_d;

//******************* SUMA DE CARGOS NO COMUNES **********************/
$op_sum_nc = $x0_nc + $x1_nc + $x2_nc + $x3_nc + $x4_nc + $x5_nc + $x6_nc + $x7_nc + $x8_nc + $x9_nc;

//***************** OPERACIONES POR APTO *************/
$ap0 =  $x0_nc / 16;
$ap1 =  $x1_nc / 16;
$ap2 =  $x2_nc / 16;
$ap3 =  $x3_nc / 16;
$ap4 =  $x4_nc / 16;
$ap5 =  $x5_nc / 16;
$ap6 =  $x6_nc / 16;
$ap7 =  $x7_nc / 16;
$ap8 =  $x8_nc / 16;
$ap9 =  $x9_nc / 16;

//**************** CIFRAS POR COPROPIETARIOS **********/
$res_pro_ap = $op_sum_nc / 16;

//*************** 10% DE RESERVA *******************/
$op_res = ($op_sum * 10) / 100;
$op_res_bs = $op_res * $tasa;

//************** 10% FONDO DE PRESTACIONES *********/
$op_fdp = ($op_sum * 10) / 100;
$op_fdp_bs = $op_fdp * $tasa;

//******* 4% DE COMISION POR USO DEL SOFTWARE ******/
$op_sof = ($op_sum * 4) / 100;
$op_sof_bs = $op_sof * $tasa;

//*************** TOTAL DE LA DEUDA ****************/
$op_total = $op_sum + $op_res + $op_fdp + $op_sof;
//********* TOTAL DE LA DEUDA, INCLUYENDO LOS CARGOS NO COMUNES *********/
$op_total_nc = $op_sum + $op_res + $op_fdp + $op_sof + $op_sum_nc;

//******************* MONTO CORRESPONDIENTE A CADA COPROPIETARIO ****************/
$res_pro = $op_res / 568; //$contador
$fdp_pro = $op_fdp / 568; //$contador
$sof_pro = $op_sof / 568; //$contador

//******************* SUMATORIA TOTAL Y DEUDA A CADA COPROPIETARIO ****************/
//******* CONJUNTO COMÚN ******/
$op_pro = $sum_pro + $res_pro + $fdp_pro + $sof_pro;
//********** APTO **********/
$op_pro_ap = $sum_pro + $res_pro + $fdp_pro + $sof_pro + $res_pro_ap;

//********** EL VALOR DE LA ALICUOTA SEGUN EL DOLAR DEL DIA ********/
$ali_pro = $op_pro / $tasa;
//********** APTO NC **********/
$ali_pro_ap = $op_pro_ap / $tasa;

//****** VALOR A AGREGAR REDONDEADO EN LA BD *****/
$n = round($ali_pro, 2);
$n_nc = round($ali_pro_ap, 2);

$nulo = 0;

//***** CODIGO RANDOM DE SEGURIDAD *****/
$crypto = bin2hex(random_bytes(4));

require_once "recibo_fondos.php";

//******* HASH ******/
// $hash = hash_pbkdf2("sha256", bin2hex(random_bytes(16)), 11, 1000, 24);

//************ OPCIONES DEL SWITCH ACTIVADO *******/
if ($switch == 'on') {
    if (trim(htmlentities(addslashes($_POST['t_nc']))) == 'ALLT') {

        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>¡Hey!</strong> Debe de seleccionar una opción para operar</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';

    } elseif (trim(htmlentities(addslashes($_POST['t_nc']))) == 'AFR' || trim(htmlentities(addslashes($_POST['t_nc']))) == '') {

        require_once "carga_ncco.php";
        require_once "recibo_ncco.php";

        $resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2");
        $resultado->execute();
        $registro = $resultado->fetchAll(PDO::FETCH_OBJ);

        foreach ($registro as $oxe) {
                $ac = $oxe->actual_oxe;
                $de = $oxe->deuda_oxe;
                $ab = $oxe->abono_oxe;
                $to = $oxe->total_oxe;
                $id = $oxe->id_scs0_rev;
                $nulo = 0;

                if ($n == $ab){
                    $rec = $to - $n;
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $nulo, ":total" => $nulo));
                    } elseif ($ab >= 0.01 && $ab > $n){
                        $rec = $ab - $n;
                        if($rec > 0){
                            $nsu = $n + $ab;
                            if($rec > 0 && $nsu >= $de){
                                $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                                $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $rec, ":total" => $nulo));
                            } else {
                                $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                                $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $rec, ":total" => $rec));
                            }
                        } else if($rec < 0){
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                        }
                    } elseif ($ab >= 0.01 && $de == 0){
                        $rec = $n - $ab;
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                    } elseif ($ab == 0){
                        if($ab == 0 && $de >= 0.01){
                            $act = $de + $n;
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                        } else {
                            $act = $de + $n;
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                        }
                    }
        }

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Cargados!</strong> Carga de <strong>Gastos No Comunes</strong></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ver_mes.php";history.forward();history.pushState(null, "", "ver_mes.php");},700);</script>';

        $conn = null;

    } elseif (trim(htmlentities(addslashes($_POST['t_nc']))) != 'AFR') {

        require_once "carga_cm.php";
        require_once "recibo.php";
        require_once "carga_ncap.php";
        require_once "recibo_ncap.php";

        $resultado_nc = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev LIKE '$edif_nc%' AND rol_scs0_rev = 2 ORDER BY vivienda_scs0_rev ASC");
        $resultado_nc->execute();
        $registro = $resultado_nc->fetchAll(PDO::FETCH_OBJ);

        foreach ($registro as $oxe) {
                $ac = $oxe->actual_oxe;
                $de = $oxe->deuda_oxe;
                $ab = $oxe->abono_oxe;
                $to = $oxe->total_oxe;
                $id = $oxe->id_scs0_rev;
                $nulo = 0;

                if ($n_nc == $ab){
                    $rec = $to - $n_nc; // OPERACION DEL NUEVO RECIBO
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $nulo, ":total" => $nulo));
                } else if ($ab >= 0.01 && $ab > $n_nc){
                    $rec = $ab - $n_nc; // OPERACION DEL NUEVO RECIBO #
                    if($rec > 0){
                        $nsu = $n_nc + $ab;
                        if($rec > 0 && $nsu >= $de){
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $rec, ":total" => $nulo));
                            } else {
                                $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                                $resultado->execute(array(":actual" => $n_nc, ":deuda" => $rec, ":abono" => $rec, ":total" => $rec));
                            }


                        } else if($rec < 0){
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n_nc, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                        }
                } else if ($ab >= 0.01 && $de == 0){
                    $rec = $n_nc - $ab; // OPERACION DEL NUEVO RECIBO
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $n_nc, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                } else if ($ab == 0){
                    if($ab == 0 && $de >= 0.01){
                        $act = $de + $n_nc;
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n_nc, ":deuda" => $act, ":total" => $act));
                    } else {
                        $act = $de + $n_nc;
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n_nc, ":deuda" => $act, ":total" => $act));
                        }
                }
        }

        $resultado_nLike = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev NOT LIKE '$edif_nc%' AND rol_scs0_rev = 2 ORDER BY vivienda_scs0_rev ASC");
        $resultado_nLike->execute();
        $registro_nLike = $resultado_nLike->fetchAll(PDO::FETCH_OBJ);

        foreach ($registro_nLike as $oxe) {
                $ac = $oxe->actual_oxe;
                $de = $oxe->deuda_oxe;
                $ab = $oxe->abono_oxe;
                $to = $oxe->total_oxe;
                $id = $oxe->id_scs0_rev;
                $nulo = 0;

                if ($n == $ab){
                    $rec = $to - $n; // OPERACION DEL NUEVO RECIBO
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $nulo, ":total" => $nulo));
                } else if ($ab >= 0.01 && $ab > $n){
                    $rec = $ab - $n; // OPERACION DEL NUEVO RECIBO #
                    if($rec > 0){
                        $nsu = $n + $ab;
                        if($rec > 0 && $nsu >= $de){
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $rec, ":total" => $nulo));
                        } else {
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $rec, ":total" => $rec));
                        }


                    } else if($rec < 0){
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                    }
                    } else if ($ab >= 0.01 && $de == 0){
                        $rec = $n - $ab; // OPERACION DEL NUEVO RECIBO
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                    } else if ($ab == 0){
                        if($ab == 0 && $de >= 0.01){
                            $act = $de + $n;
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                        } else {
                            $act = $de + $n;
                            $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                            $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                        }
                    }
        }

        echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Cargados!</strong> Carga de <b>No Comunes a  " . $edif_nc . "</b> <i class='fa-solid fa-file-circle-check'></i></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ver_mes.php";history.forward();history.pushState(null, "", "ver_mes.php");},700);</script>';

        $conn = null;

    } else {

        echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Error {cargar[C01]}</strong> Ha ocurrido un error inesperado</div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';

    }
} elseif ($switch == 'off') {

    require_once "carga_cm.php";
    require_once "recibo.php";

    $resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2");
    $resultado->execute();
    $registro = $resultado->fetchAll(PDO::FETCH_OBJ);

    foreach ($registro as $oxe) {
            $ac = $oxe->actual_oxe;
            $de = $oxe->deuda_oxe;
            $ab = $oxe->abono_oxe;
            $to = $oxe->total_oxe;
            $id = $oxe->id_scs0_rev;
            $nulo = 0;

            if ($n == $ab){
                $rec = $to - $n; // OPERACION DEL NUEVO RECIBO
                $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $nulo, ":total" => $nulo));
            } else if ($ab >= 0.01 && $ab > $n){
                $rec = $ab - $n; // OPERACION DEL NUEVO RECIBO #
                if($rec > 0){
                    $nsu = $n + $ab;
                    if($rec > 0 && $nsu >= $de){
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $nulo, ":deuda" => $nulo, ":abono" => $rec, ":total" => $nulo));
                    } else {
                        $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                        $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $rec, ":total" => $rec));
                    }
                } else if($rec < 0){
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
                }
            } else if ($ab >= 0.01 && $de == 0){
                $rec = $n - $ab; // OPERACION DEL NUEVO RECIBO
                $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, abono_oxe = :abono, total_oxe = :total WHERE id_scs0_rev = '$id'");
                $resultado->execute(array(":actual" => $n, ":deuda" => $rec, ":abono" => $nulo, ":total" => $rec));
            } else if ($ab == 0){
                if($ab == 0 && $de >= 0.01){
                    $act = $de + $n;
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                } else {
                    $act = $de + $n;
                    $resultado = $conn->prepare("UPDATE usuarios_scs0_oxerev SET actual_oxe = :actual, deuda_oxe = :deuda, total_oxe = :total WHERE id_scs0_rev = '$id'");
                    $resultado->execute(array(":actual" => $n, ":deuda" => $act, ":total" => $act));
                }
            }
    }

    echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Datos Cargados con Éxito!</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 1000);</script>';
    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "ver_mes.php";history.forward();history.pushState(null, "", "ver_mes.php");},700);</script>';

    $conn = null;

} else {

    echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Error {cargar[C02]}</strong> Ha ourrido un error inesperado</script></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 5000);</script>';

}