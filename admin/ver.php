<?php
session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 1)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}

date_default_timezone_set('America/Caracas');
require_once '../vistas-admin/parte_superior.php';
require_once '../controlador/config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

// MOSTRAR DATOS DEL CONJUNTO, RESIDENCIA, TORRES, COUNTRY, ENTRE OTROS
$resi = $conn->prepare("SELECT * FROM residencia_scsxx_oxerev WHERE id_ref_scsxx_rev = 1");
$resi->execute();
$residencia = $resi->fetch(PDO::FETCH_OBJ);
$resident = $residencia->residencia_scsxx_rev;
$nombre = $residencia->nombre_scsxx_rev;
$rif = $residencia->rif_scsxx_rev;
$direccion = $residencia->direccion_scsxx_rev;


if($_SESSION['op_extra'] == 'pago_comp'){
    //**** Ticket Pagado *****/

    $id_cpg = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM procesado_scs3_oxerev WHERE id_ref_scs3_rev = '$id_cpg'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs3_rev;
    $vivienda = $registros->vivienda_scs3_rev;
    $monto = $registros->monto_scs3_rev;
    $montoUsd = $registros->monto_usd_scs3_rev;
    $metodo = $registros->metodo_scs3_rev;
    $codigo = $registros->codigo_scs3_rev;
    $concepto = $registros->concepto_scs3_rev;
    $fech = $registros->fecha_scs3_rev;

    $result1 = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda'  AND pro_in_scs0_rev = 'Propietario'");
    $result1->execute();
    // MOSTRAR LOS USUARIOS
    $registro = $result1->fetch(PDO::FETCH_OBJ);
    $propietario = $registro->nombre_scs0_rev;

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Comprobante de Pago_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . strtoupper($codigo) . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Comprobante N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Propietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $propietario . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%;'>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Concepto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Monto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Monto REF</td>
                            </tr>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . ucwords($concepto) . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . number_format($monto, 2, ',', '.') . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 10px;'>" . number_format($montoUsd, 2, ',', '.') . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";
?>

<div class="container">
    <h1>Comprobante de Pago</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Comprobante N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Propietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $propietario ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%;'>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796">Concepto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796">Monto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 10px; color: #000; font-weight: bold; border-color: #858796">Monto REF</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;"><?php echo ucwords($concepto) ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;"><?php echo number_format($monto, 2, ',', '.') ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 10px;"><?php echo number_format($montoUsd, 2, ',', '.') ?></td>
                    </tr>
                </table>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="pago.php" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="index.php" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif($_SESSION['op_extra'] == 'tiquet'){
    //***** Comprobante de Mes ****/
    $id_tqt = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM ticket_scs5_oxerev WHERE id_ref_scs5_rev = '$id_tqt'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs5_rev;
    $vivienda = $registros->vivienda_scs5_rev;
    $monto = $registros->monto_scs5_rev;
    $montoUsd = $registros->monto_usd_scs5_rev;
    $codigo = $registros->codigo_scs5_rev;
    $concepto = $registros->concepto_scs5_rev;
    $fech = $registros->fecha_scs5_rev;

    $result1 = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda' AND pro_in_scs0_rev = 'Propietario'");
    $result1->execute();
    // MOSTRAR LOS USUARIOS
    $registro = $result1->fetch(PDO::FETCH_OBJ);
    $propietario = $registro->nombre_scs0_rev;

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Ticket_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . strtoupper($codigo) . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Comprobante N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Propietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $propietario . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%;'>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Concepto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Monto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Monto REF</td>
                            </tr>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . ucwords($concepto) . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . number_format($monto, 2, ',', '.') . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 10px;'>" . number_format($montoUsd, 2, ',', '.') . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";
?>

<div class="container">
    <h1>Ticket</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Comprobante N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Propietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $propietario ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%;'>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold;">Concepto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold;">Monto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 10px; color: #000; font-weight: bold;">Monto REF</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;"><?php echo ucwords($concepto) ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;"><?php echo number_format($monto, 2, ',', '.') ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 10px;"><?php echo number_format($montoUsd, 2, ',', '.') ?></td>
                    </tr>
                </table>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="ticket.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="index.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif($_SESSION['op_extra'] == 'alq'){
    //***** Reserva por Alquiler *****/

    $id_aql = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM alquiler_scs6_oxerev WHERE id_ref_scs6_rev = '$id_aql'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs6_rev;
    $vivienda = $registros->vivienda_scs6_rev;
    $name = $registros->nombre_scs6_rev;
    $codigo = $registros->codigo_scs6_rev;
    $concepto = $registros->comentario_scs6_rev;
    $reserv = $registros->fecha_scs6_rev;
    $fech = $registros->fecha_op_scs6_rev;

    $resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda' AND pro_in_scs0_rev = 'Propietario'");
    $resultado->execute();

    $registro = $resultado->fetch(PDO::FETCH_OBJ);
    $namePropietario = $registro->nombre_scs0_rev;

    $dater = date_create($reserv);
    $reserva =  date_format($dater, "d-m-Y");

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Reserva por Alquiler_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . $codigo . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Comprobante N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Propietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $namePropietario . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%;'>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-bottom: 2px solid; border-color: #858796'>Concepto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-bottom: 2px solid; border-color: #858796'>Fecha Reservada</td>
                            </tr>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . ucwords($concepto) . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px; font-weight: bold'>" . $reserva . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";

?>

<div class="container">
    <h1>Reserva por Alquiler</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Comprobante N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Propietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $namePropietario ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%;'>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 1px; color: #000; font-weight: bold; border-bottom: 2px solid; border-color: #858796">Concepto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 1px; color: #000; font-weight: bold; border-bottom: 2px solid; border-color: #858796">Fecha Reservada</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 1px;"><?php echo ucwords($concepto) ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 1px; font-weight: bold;"><?php echo $reserva ?></td>
                    </tr>
                </table>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="cs.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" rel="noopener noreferrer" target="_blank" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="inicio.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif($_SESSION['op_extra'] == 'kre'){
    //***** Carta de Residencia *****/

    $id_cdr = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM kresidencia_scs7_oxerev WHERE id_ref_scs7_rev = '$id_cdr'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs7_rev;
    $vivienda = $registros->vivienda_scs7_rev;
    $identificacionID = $registros->cedula_scs7_rev;
    $antiguedad = $registros->antiguedad_scs7_rev;
    $piso = $registros->piso_scs7_rev;
    $codigo = $registros->codigo_scs7_rev;
    $solicitante = $registros->nombre_scs7_rev;
    $fech = $registros->fecha_scs7_rev;

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    function fechaTraducida($fecha)
    {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anno = date('Y', strtotime($fecha));

        $diasEs = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
        $diasEn = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $nombreDia = str_replace($diasEn, $diasEs, $dia);
        $num = array(31, 30, 29, 28, 27, 26, 25, 24, 23, 22, 21, 20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
        $numEs = array('Treinta y Uno', 'Treinta', 'Veintinueve', 'Veintiocho', 'Veintisiete', 'Veintiséis', 'Veinticinco', 'Veinticuatro', 'Veintitrés', 'Veintidos', 'Veintiuno', 'Veinte', 'Diecinueve', 'Dieciocho', 'Diecisiete', 'Dieciséis', 'Quince', 'Catorce', 'Trece', 'Doce', 'Once', 'Diez', 'Nueve', 'Ocho', 'Siete', 'Seis', 'Cinco', 'Cuatro', 'Tres', 'Dos', 'Primero');
        $numberDia = str_replace($num, $numEs, $numeroDia);
        $mesesEs = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $mesesEn = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $nombreMes = str_replace($mesesEn, $mesesEs, $mes);
        $numAnno = array(2033, 2032, 2031, 2030, 2029, 2028, 2027, 2026, 2025, 2024, 2023, 2022);
        $letAnno = array('Dos Mil Treinta y Tres', 'Dos Mil Treinta y Dos', 'Dos Mil Treinta y Uno', 'Dos Mil Treinta', 'Dos Mil Veintinueve', 'Dos Mil Veintiocho', 'Dos Mil Veintisiete', 'Dos Mil Veintiséis', 'Dos Mil Veinticinco', 'Dos Mil Veinticuatro', 'Dos Mil Veintitres', 'Dos Mil Veintidos');
        $letterAnno = str_replace($numAnno, $letAnno, $anno);

        return 'el día ' . $nombreDia . ', a los ' . $numberDia . ' (' . $numeroDia . ') días del mes de ' . $nombreMes . ' del año ' . $letterAnno . ' (' . $anno . ')';
    }

    function viviendaTraducida($vivienda = null, $antiguedad = null, $piso = null)
    {
        $viviendaInput = $vivienda;
        $antiguedadInput = $antiguedad;
        $edif = substr($viviendaInput, 0, 2); //EDIF
        $annos = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
        $letraAnnos = array('Diez', 'Nueve', 'Ocho', 'Siete', 'Seis', 'Cinco', 'Cuatro', 'Tres', 'Dos', 'Uno');
        $numLet = str_replace($annos, $letraAnnos, $antiguedad);

        return '<strong>' . $viviendaInput . '</strong> quien reside en el Edificio: ' . $edif . ', Piso ' . $piso . ', Apartamento: ' . $viviendaInput . '. Desde hace '. $numLet . ' (' . $antiguedadInput . ') años.';
    }


    $_SESSION['title'] = "Carta de Residencia_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . strtoupper($codigo) . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <br>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 100%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Copropietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $solicitante . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px; text-align:justify'>Quién suscribe, La Junta de Condominio del <strong>" . $resident . " " . $nombre . ", " . $direccion . "</strong>, hace constar que el (la) ciudadano(a) <strong style='text-transform: uppercase'>" . $solicitante . "</strong>, titular de cédula de identidad " . $identificacionID . " de la vivienda " . viviendaTraducida($vivienda, $antiguedad, $piso) . "</p>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px; text-align:justify'>Constancia que se expide a petición de la parte interesada en Guatire " . fechaTraducida($fecha) . "</p>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";

?>

<div class="container">
<h1>Carta de Residencia</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <br>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 100%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Copropietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $solicitante ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <br>
                <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px; text-align:justify'>Quién suscribe, La Junta de Condominio del <strong><?php echo $resident . " " . $nombre . ", " . $direccion ?></strong>, hace constar que el (la) ciudadano(a) <strong style="text-transform: uppercase"><?php echo $solicitante ?></strong>, titular de cédula de identidad <?php echo $identificacionID ?> de la vivienda <?php echo viviendaTraducida($vivienda, $antiguedad, $piso) ?></p>
                <br>
                <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px; text-align:justify'>Constancia que se expide a petición de la parte interesada en Guatire <?php echo fechaTraducida($fecha) ?></p>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="cs.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" rel="noopener noreferrer" target="_blank" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="inicio.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif($_SESSION['op_extra'] == 'sol'){
    //***** Comprobante de Solvencia *****/

    $id_mdz = $_SESSION['id_extra'];
    
    $result = $conn->prepare("SELECT * FROM solvencia_scs8_oxerev WHERE id_ref_scs8_rev = '$id_mdz'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs8_rev;
    $vivienda = $registros->vivienda_scs8_rev;
    $codigo = $registros->codigo_scs8_rev;
    $concepto = $registros->comentario_scs8_rev;
    $fech = $registros->fecha_scs8_rev;

    $resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda' AND pro_in_scs0_rev = 'Propietario'");
    $resultado->execute();

    $registro = $resultado->fetch(PDO::FETCH_OBJ);
    $namePropietario = $registro->nombre_scs0_rev;

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Solvencia_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . strtoupper($codigo) . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <br>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Propietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $namePropietario . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px;'>El/La propietario/a <strong>" . $namePropietario . "</strong>, de la vivienda <strong>" . $vivienda . "</strong> del <strong>" . $resident . " " . $nombre . "</strong>, no presenta alguna deuda ordinaria o especial pendiente ante el condominio.</p>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";

?>

    <div class="container">
    <h1>Comprobante de Solvencia</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <br>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Propietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $namePropietario ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <br>
                <p style='margin: 0 auto; width: 90%; line-height: 1.3; font-size: 110%; text-indent: 11px;'>El/La propietario/a <strong><?php echo $namePropietario ?></strong>, de la vivienda <strong><?php echo $vivienda ?></strong> del <strong><?php echo $resident . " " . $nombre ?></strong>, no presenta alguna deuda ordinaria o especial pendiente ante el condominio.</p>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="cs.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" rel="noopener noreferrer" target="_blank" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="inicio.php"  rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif($_SESSION['op_extra'] == 'mud'){
    //***** Comprobante de Mudanza *****/

    $id_mdz = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM mudanza_scs9_oxerev WHERE id_ref_scs9_rev = '$id_mdz'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs9_rev;
    $vivienda = $registros->vivienda_scs9_rev;
    $codigo = $registros->codigo_scs9_rev;
    $concepto = $registros->comentario_scs9_rev;
    $reserv = $registros->fecha_scs9_rev;
    $fech = $registros->fecha_actual_scs9_rev;

    $resultado = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$vivienda' AND pro_in_scs0_rev = 'Propietario'");
    $resultado->execute();

    $registro = $resultado->fetch(PDO::FETCH_OBJ);
    $namePropietario = $registro->nombre_scs0_rev;


    $dater = date_create($reserv);
    $reserva =  date_format($dater, "d-m-Y");

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Mudanza_" . $id_no;
    $_SESSION['a4'] = " <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left;'></td>
                                <td style='text-align: left;'></td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Fecha:</strong> " . $fecha . "</td>
                                <td style='text-align: right; font-weight: normal; font-size: 140%;'>" . strtoupper($codigo) . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>N<sup>o</sup>:</strong> " . $id_no . "</td>
                                <td style='text-align: right; font-weight: bold;'></td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                            <tr>
                                <td style='text-align: left; font-weight: bold;'>Propietario:</td>
                                <td style='text-align: right; font-weight: bold;'>" . $resident . " " . $nombre . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'>" . $namePropietario . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $direccion . "</td>
                            </tr>
                            <tr>
                                <td style='text-align: left;'><strong>Apto:</strong> " . $vivienda . "</td>
                                <td style='text-align: right; font-size: 75%;'>" . $rif . "</td>
                            </tr>
                        </table>
                        <table style='margin: 0 auto; width: 90%;'>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Concepto</td>
                                <td style='text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796'>Fecha de Mudanza</td>
                            </tr>
                            <tr>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px;'>" . ucwords($concepto) . "</td>
                                <td style='text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 10px; font-weight: bold'>" . $reserva . "</td>
                            </tr>
                        </table>
                        <br>
                        <p style='margin: 0 auto; width: 90%; line-height: 1.5; font-size: 100%; text-align: center;'><span style='letter-spacing: -4px;'>______________________________________</span><br>Presidente/a de la Junta de Condominio</p>
                        <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>";

?>

    <div class="container">
    <h1>Comprobante de Mudanza</h1>
</div>
<div class="card-body">
    <div class="position-relative">
        <div class="container-fluid invoice-container position-relative top-0 start-50 translate-middle-x" style="margin: 15px; padding: 20px 40px 10px 40px !important; max-width: 850px; background-color: #fff; border: 1px solid #ccc; border-radius: 10px;">
        <div class="card-body">
                <table style='margin: 0 auto; width: 90%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%; line-height: .9; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Propietario:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $namePropietario ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Apto:</strong> <?php echo $vivienda ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <table style='margin: 0 auto; width: 90%;'>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd; border-radius: 1px; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796">Concepto</td>
                        <td style="text-align: center; padding: 5px; background-color: #d1e7dd;  border-radius: 1px; border-radius: 10px; color: #000; font-weight: bold; border-color: #858796">Fecha de Mudanza</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee; border-radius: 1px; border-radius: 10px;"><?php echo ucwords($concepto) ?></td>
                        <td style="text-align: center; padding: 5px; background-color: #eeeeee;  border-radius: 1px; border-radius: 10px; font-weight: bold;"><?php echo $reserva ?></td>
                    </tr>
                </table>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    </div>
    <p class="text-center">
        <a href="cs.php"  rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="inicio.php"  rel="noopener noreferrer"class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php } elseif(trim($_SESSION['op_extra']) == 'rec_mes'){

    //***** Recibo de Mes  *****/

    $id_rec_mes = $_SESSION['id_extra'];

    $result = $conn->prepare("SELECT * FROM recibo_scs4_oxerev WHERE id_ref_scs4_rev = '$id_rec_mes'");
    $result->execute();
    // MOSTRAR LOS USUARIOS
    $registros = $result->fetch(PDO::FETCH_OBJ);
    $id_no = $registros->id_ref_scs4_rev;
    $codigo = $registros->codigo_scs4_rev;
    $ncCo = $registros->ncCo;
    $ncPro = $registros->ncPro;
    $subCo = $registros->subCo;
    $subPro = $registros->subPro;
    $reservaCo = $registros->reservaCo;
    $reservaPro = $registros->reservaPro;
    $prestacionCo = $registros->prestacionCo;
    $prestacionPro = $registros->prestacionPro;
    $softCo = $registros->softCo;
    $softPro = $registros->softPro;
    $totalCo = $registros->totalCo;
    $totalPro = $registros->totalPro;
    $totalProUsd = $registros->totalPro_usd_scs4_rev;
    $n_c = $registros->ccomun_scs4_rev;
    $fech = $registros->fecha_scs4_rev;

    //******* FONDO DE RESERVA ******/
    $fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 1");
    $fondos->execute();
    $fondo = $fondos->fetch(PDO::FETCH_ASSOC);
    $res_nomb = $fondo['nombre_fondo_scs12_rev'];
    $res_mont = $fondo['monto_scs12_rev'];
    //******* /FONDO DE RESERVA ******/

    //******* FONDO DE PRESTACIONES ******/
    $fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 2");
    $fondos->execute();
    $fondo = $fondos->fetch(PDO::FETCH_ASSOC);
    $fdp_nomb = $fondo['nombre_fondo_scs12_rev'];
    $fdp_mont = $fondo['monto_scs12_rev'];
    //******* /FONDO DE PRESTACIONES ******/

    $datef = date_create($fech);
    $fecha =  date_format($datef, "d-m-Y");

    $_SESSION['title'] = "Recibo" . $fecha . '_No_' . $id_no;

    if($ncCo != 0 && $ncPro != 0) {
        if($n_c == 'AFR'){
            $_SESSION['a4'] = ' <div class="card-body">
                                <p style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 100%;">Recibo</p>
                                <h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: -5px;"></h1>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.1; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left;"></td>
                                        <td style="text-align: left;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Fecha:</strong>' . $fecha . '</td>
                                        <td style="text-align: right; font-weight: normal; font-size: 140%;">' . $codigo . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Recibo N<sup>o</sup>:</strong> ' . $id_no . '</td>
                                        <td style="text-align: right; font-weight: bold;"></td>
                                    </tr>
                                </table>
                                <br>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.2; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left; font-weight: bold;">Administrador:</td>
                                        <td style="text-align: right; font-weight: bold;">' . $resident . ' ' . $nombre . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">' . $_SESSION['rev_conectado'] . '</td>
                                        <td style="text-align: right; font-size: 75%;">' . $direccion . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Condominio:</strong> Oficina Virtual</td>
                                        <td style="text-align: right; font-size: 75%;">' . $rif . '</td>
                                    </tr>
                                </table>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 100%";>
                                    <tr style="background-color: rgb(17, 127, 90); color: #ffffff">
                                        <td style="border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Relación de Gastos</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Comunes</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Alicuota</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Sub-Total del Mes
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($subCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($subPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Sub-Total de N/C
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($ncCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($ncPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            10% Fondo de Reserva
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($reservaCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($reservaPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Fondo de Prestaciones
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($prestacionCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($prestacionPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left;">
                                            4% Servicio del Software
                                        </td>
                                        <td style="padding: 1px; text-align: right;">
                                            ' . number_format($softCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($softPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;">
                                            Total a Pagar
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;">
                                            ' . number_format($totalCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;">
                                            ' . number_format($totalPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 95%;  text-align: center;">
                                    <tr style="background-color: #04aa6d; color: #fff; font-weight: bold;">
                                        <td style="padding: 3px">Alicuota</td>
                                        <td style="padding: 3px">Alicuota REF</td>
                                    </tr>
                                    <tr style="background-color: #ddd; color: #000;">
                                        <td style="padding: 3px">' . number_format($totalPro, 2, ',', '.') . '</td>
                                        <td style="padding: 3px">' . number_format($totalProUsd, 2, ',', '.') . '</td>
                                </tr>
                                </table>
                                <br>
                                <div>
                                    <h1 style="font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 70%">Nota Adicional</h1>
                                        <p style="text-align: center; margin: 3px auto">Este es un resumen, el recibo completo fue enviado a su correo electrónico el día de la emisión</p>
                                </div>
                                <p style="text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;">Oxe<span style="color:#58ec00">Rev</span>©</p>
                            </div>';
        } elseif($n_c != 'AFR' && $n_c != 'ALLT'){
            $_SESSION['a4'] = ' <div class="card-body">
                                <p style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 100%;">Recibo</p>
                                <h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: -5px;"></h1>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.1; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left;"></td>
                                        <td style="text-align: left;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Fecha:</strong>' . $fecha . '</td>
                                        <td style="text-align: right; font-weight: normal; font-size: 140%;">' . $codigo . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Recibo N<sup>o</sup>:</strong> ' . $id_no . '</td>
                                        <td style="text-align: right; font-weight: bold;"></td>
                                    </tr>
                                </table>
                                <br>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.2; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left; font-weight: bold;">Administrador:</td>
                                        <td style="text-align: right; font-weight: bold;">' . $resident . ' ' . $nombre . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">' . $_SESSION['rev_conectado'] . '</td>
                                        <td style="text-align: right; font-size: 75%;">' . $direccion . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Condominio:</strong> Oficina Virtual</td>
                                        <td style="text-align: right; font-size: 75%;">' . $rif . '</td>
                                    </tr>
                                </table>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 100%";>
                                    <tr style="background-color: rgb(17, 127, 90); color: #ffffff">
                                        <td style="border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Relación de Gastos</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Comunes</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Alicuota</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Sub-Total del Mes
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($subCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($subPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Sub-Total N/C Viv ' . $n_c . '
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($ncCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($ncPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            10% Fondo de Reserva
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($reservaCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($reservaPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Fondo de Prestaciones
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($prestacionCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($prestacionPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left;">
                                            4% Servicio del Software
                                        </td>
                                        <td style="padding: 1px; text-align: right;">
                                            ' . number_format($softCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($softPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;">
                                            Total a Pagar
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;">
                                            ' . number_format($totalCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;">
                                            ' . number_format($totalPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 95%;  text-align: center;">
                                    <tr style="background-color: #04aa6d; color: #fff; font-weight: bold;">
                                        <td style="padding: 3px">Alicuota</td>
                                        <td style="padding: 3px">Alicuota REF</td>
                                    </tr>
                                    <tr style="background-color: #ddd; color: #000;">
                                        <td style="padding: 3px">' . number_format($totalPro, 2, ',', '.') . '</td>
                                        <td style="padding: 3px">' . number_format($totalProUsd, 2, ',', '.') . '</td>
                                </tr>
                                </table>
                                <br>
                                <div>
                                    <h1 style="font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 70%">Nota Adicional</h1>
                                        <p style="text-align: center; margin: 3px auto">Este es un resumen, el recibo completo fue enviado a su correo electrónico el día de la emisión</p>
                                </div>
                                <p style="text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;">Oxe<span style="color:#58ec00">Rev</span>©</p>
                            </div>';
        }
    } elseif($ncCo == 0 && $ncPro == 0){
        $_SESSION['a4'] = ' <div class="card-body">
                                <p style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 100%;">Recibo</p>
                                <h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: -5px;"></h1>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.1; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left;"></td>
                                        <td style="text-align: left;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Fecha:</strong>' . $fecha . '</td>
                                        <td style="text-align: right; font-weight: normal; font-size: 140%;">' . $codigo . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Recibo N<sup>o</sup>:</strong> ' . $id_no . '</td>
                                        <td style="text-align: right; font-weight: bold;"></td>
                                    </tr>
                                </table>
                                <br>
                                <table style="margin: 0 auto; width: 100%; line-height: 1.2; font-size: 95%;">
                                    <tr>
                                        <td style="text-align: left; font-weight: bold;">Administrador:</td>
                                        <td style="text-align: right; font-weight: bold;">' . $resident . ' ' . $nombre . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">' . $_SESSION['rev_conectado'] .'</td>
                                        <td style="text-align: right; font-size: 75%;">' . $direccion . '</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;"><strong>Condominio:</strong> Oficina Virtual</td>
                                        <td style="text-align: right; font-size: 75%;">' . $rif . '</td>
                                    </tr>
                                </table>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 100%";>
                                    <tr style="background-color: rgb(17, 127, 90); color: #ffffff">
                                        <td style="border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Relación de Gastos</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Comunes</p>
                                        </td>
                                        <td style="border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 3px; text-transform: capitalize; font-weight: bold">
                                            <p>Alicuota</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Sub-Total del Mes
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($subCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($subPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            10% Fondo de Reserva
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($reservaCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($reservaPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left">
                                            Fondo de Prestaciones
                                        </td>
                                        <td style="padding: 1px; text-align: right">
                                            ' . number_format($prestacionCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($prestacionPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px; text-align: left;">
                                            4% Servicio del Software
                                        </td>
                                        <td style="padding: 1px; text-align: right;">
                                            ' . number_format($softCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 1px; text-align: right; background-color: #cbfeeb;">
                                            ' . number_format($softPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;">
                                            Total a Pagar
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;">
                                            ' . number_format($totalCo, 2, ',', '.') . '
                                        </td>
                                        <td style="padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;">
                                            ' . number_format($totalPro, 2, ',', '.') . '
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <table style="border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 95%;  text-align: center;">
                                    <tr style="background-color: #04aa6d; color: #fff; font-weight: bold;">
                                        <td style="padding: 3px">Alicuota</td>
                                        <td style="padding: 3px">Alicuota REF</td>
                                    </tr>
                                    <tr style="background-color: #ddd; color: #000;">
                                        <td style="padding: 3px">' . number_format($totalPro, 2, ',', '.') . '</td>
                                        <td style="padding: 3px">' . number_format($totalProUsd, 2, ',', '.') . '</td>
                                </tr>
                                </table>
                                <br>
                                <div>
                                    <h1 style="font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 70%">Nota Adicional</h1>
                                        <p style="text-align: center; margin: 3px auto">Este es un resumen, el recibo completo fue enviado a su correo electrónico el día de la emisión</p>
                                </div>
                                <p style="text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;">Oxe<span style="color:#58ec00">Rev</span>©</p>
                            </div>';
    }
?>

<div class="container">
<h1>Recibo del Mes</h1>
</div>
<div class="card-body">
    <div class="position-relative">
            <div class="card-body">
                <p style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 100%;">Recibo</p>
                <h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: -5px;"></h1>
                <table style='margin: 0 auto; width: 100%; line-height: 1.1; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Fecha:</strong> <?php echo $fecha ?></td>
                        <td style="text-align: right; font-weight: normal; font-size: 140%;"><?php echo strtoupper($codigo) ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Recibo N<sup>o</sup>:</strong> <?php echo $id_no ?></td>
                        <td style="text-align: right; font-weight: bold;"></td>
                    </tr>
                </table>
                <br>
                <table style='margin: 0 auto; width: 100%; line-height: 1.2; font-size: 95%;'>
                    <tr>
                        <td style="text-align: left; font-weight: bold;">Administrador:</td>
                        <td style="text-align: right; font-weight: bold;"><?php echo $resident . ' ' . $nombre ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><?php echo $_SESSION['rev_conectado'] ?></td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $direccion ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>Condominio:</strong> Oficina Virtual</td>
                        <td style="text-align: right; font-size: 75%;"><?php echo $rif ?></td>
                    </tr>
                </table>
                <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 100%';>
                    <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                        <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: capitalize; font-weight: bold'>
                            <p>Relación de Gastos</p>
                        </td>
                        <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: capitalize; font-weight: bold'>
                            <p>Comunes</p>
                        </td>
                        <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: capitalize; font-weight: bold'>
                            <p>Alicuota</p>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding: 1px; text-align: left'>
                            Sub-Total del Mes
                        </td>
                        <td style='padding: 1px; text-align: right'>
                            <?php echo number_format($subCo, 2, ',', '.') ?>
                        </td>
                        <td style='padding: 1px; text-align: right; background-color: #cbfeeb;'>
                            <?php echo number_format($subPro, 2, ',', '.') ?>
                        </td>
                    </tr>
                    <?php if($ncCo != 0 && $ncPro != 0){
                                if($n_c == 'AFR'){ ?>
                        <tr>
                            <td style='padding: 3px; text-align: left'>
                                Sub-Total N/C General
                            </td>
                            <td style='padding: 3px; text-align: right'>
                                <?php echo number_format($ncCo, 2, ',', '.') ?>
                            </td>
                            <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                                <?php echo number_format($ncPro, 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php } elseif($n_c != 'AFR' && $n_c != 'ALLT'){ ?>
                        <tr>
                            <td style='padding: 3px; text-align: left'>
                                Sub-Total N/C Viv <?php echo $n_c ?>
                            </td>
                            <td style='padding: 3px; text-align: right'>
                                <?php echo number_format($ncCo, 2, ',', '.') ?>
                            </td>
                            <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                                <?php echo number_format($ncPro, 2, ',', '.') ?>
                            </td>
                        </tr>
                    <?php }} ?>
                    <tr>
                        <td style='padding: 1px; text-align: left'>
                            10% Fondo de Reserva
                        </td>
                        <td style='padding: 1px; text-align: right'>
                            <?php echo number_format($reservaCo, 2, ',', '.') ?>
                        </td>
                        <td style='padding: 1px; text-align: right; background-color: #cbfeeb;'>
                            <?php echo number_format($reservaPro, 2, ',', '.') ?>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding: 1px; text-align: left'>
                            Fondo de Prestaciones
                        </td>
                        <td style='padding: 1px; text-align: right'>
                            <?php echo number_format($prestacionCo, 2, ',', '.') ?>
                        </td>
                        <td style='padding: 1px; text-align: right; background-color: #cbfeeb;'>
                            <?php echo number_format($prestacionPro, 2, ',', '.') ?>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding: 1px; text-align: left;'>
                            4% Servicio del Software
                        </td>
                        <td style='padding: 1px; text-align: right;'>
                            <?php echo number_format($softCo, 2, ',', '.') ?>
                        </td>
                        <td style='padding: 1px; text-align: right; background-color: #cbfeeb;'>
                            <?php echo number_format($softPro, 2, ',', '.') ?>
                        </td>
                    </tr>
                    <tr style='font-weight: bold;'>
                        <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                            Total a Pagar
                        </td>
                        <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                            <?php echo number_format($totalCo, 2, ',', '.') ?>
                        </td>
                        <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                            <?php echo number_format($totalPro, 2, ',', '.') ?>
                        </td>
                    </tr>
                </table>
                <br>
                <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 95%;  text-align: center;'>
                    <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                        <td style='padding: 3px'>Alicuota</td>
                        <td style='padding: 3px'>Alicuota REF</td>
                    </tr>
                    <tr style='background-color: #ddd; color: #000;'>
                        <td style='padding: 3px'><?php echo number_format($totalPro, 2, ',', '.') ?></td>
                        <td style='padding: 3px'><?php echo number_format($totalProUsd, 2, ',', '.')?></td>
                </tr>
                </table>
                <br>
                <div>
                    <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 70%'>Nota Adicional</h1>
                        <p style='text-align: center; margin: 3px auto'>Este es un resumen, el recibo completo fue enviado a su correo electrónico el día de la emisión</p>
                </div>
                <p style='text-align: center; font-size: 70%; line-height: 2.75; font-weight: bold;'>Oxe<span style='color:#58ec00'>Rev</span>©</p>
            </div>
        </div>
    <p class="text-center">
        <a href="mes.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-arrow-left"></i>&nbsp;Volver&nbsp;</a>
        <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color:#00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
        <a href="inicio.php" class="btn btn-primary py-3" rel="noopener noreferrer">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
    </p>
</div>

<?php

} else {

    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1000);</script>';
?>

<!-- index del contenido principal -->
<div class="container">
    <div class="row text-center col-lg-12 mb-4">
        <div class="card text-center shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-success">Error {ver[100]} Lo sentimos pero su solicitud no puede ser procesada <i class="fa-solid fa-database"></i></i></h3>
            </div>
        </div>
    </div>
</div>

<?php } ?>
<script src="../js/bootstrap.bundle.min.js"></script>

<?php require_once '../vistas-admin/parte_inferior.php'; ?>