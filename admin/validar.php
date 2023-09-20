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

require_once '../vistas-admin/parte_superior.php';
require_once '../controlador/config.php';

$insta_conn = new Conexion();
$conn = $insta_conn->Conectar();

if($_SESSION['op_extra'] == 'abono'){

    $id_ref = $_SESSION['id_extra'];
    $_SESSION['pago'] = 'pago_cuota';

    $sql = $conn->prepare("SELECT * FROM pagos_scs1_oxerev WHERE id_ref_scs1_rev = '$id_ref' AND view_scs1_rev = 1");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $viv = $show->datap_vivienda_scs1_rev;
    $usu = $show->usuario_scs1_rev;
    $ref = $show->referencia_scs1_rev;
    $mod = $show->modalidad_scs1_rev;
    $com = $show->comentario_scs1_rev;

    $sqlC = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE user_scs0_rev = '$usu'");
    $sqlC->execute();
    $showC = $sqlC->fetch(PDO::FETCH_OBJ);
    $ema = $showC->correo_scs0_rev;
    $nom = $showC->nombre_scs0_rev;

?>

<div class="container">
    <h1>Confirmación de Abonado</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

        <?php
            $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$viv'");
            $sql->execute();

            $datos = $sql->fetch(PDO::FETCH_ASSOC);
            $abono_oxe = $datos['abono_oxe'];
            $total_oxe = $datos['total_oxe'];
        ?>
            <!-- MUESTRA DE SALDOS -->
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Abonado (A Favor)</label>
                    <input type="number" class="form-control" value="<?php echo $abono_oxe ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Deuda Total</label>
                    <input type="number" class="form-control" value="<?php echo $total_oxe ?>" disabled>
                </div>
            </div>
            <br>
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" action="" id="datoHtml">
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Monto</label>
                    <input type="number" class="form-control" id="ab" name="ab" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Concepto</label>
                    <input type="text" class="form-control" id="co" name="co"placeholder="Abono del mes...">
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-danger">
                        <span class="icon text-white-50">
                            <i class="fas fa-eraser"></i>
                        </span>Limpiar
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                        <i class="fas fa-reply"></i>
                        </span>Solicitar Reenvio
                    </button>
                    <button type="button" id="btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>Procesar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Confiración -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">¿Deseas realizar el abonado del siguiente usuario?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <b>N<sup>o</sup>:</b>&nbsp;<?php echo $id_ref ?></b><input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>"><br>
                                <b>Usuario:</b>&nbsp;<?php echo $usu ?><input type="hidden" name="usu" id="usu" value="<?php echo $usu ?>"><br>
                                <b>Vivienda:</b>&nbsp;<?php echo $viv ?><br><input type="hidden" name="viv" id="viv" value="<?php echo $viv ?>"></br> Al <b>confirmar</b> este abono, será procesado y volverá al apartado de <b>Abonados</b> nuevamente para realizar nuevas acciones.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="btnConfirmar" id="btnConfirmar">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Reenvio -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Solicitar Reenvio de Pago</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Solicitará el reenvio de datos a <strong><?php echo $nom ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <textarea class="form-control" id="sms_motivo" name="sms_motivo" rows="3" placeholder="Motivo del rechazo de datos"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="nom" id="nom" value="<?php echo $nom ?>">
                        <input type="hidden" name="ref" id="ref" value="<?php echo $ref ?>">
                        <input type="hidden" name="ema" id="ema" value="<?php echo $ema ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Solicitar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>
                    <br></br>
                </div>

                <div class="col-lg-6">

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datos de Abono Seleccionado</h6>
                        </div>
                        <div class="card-body">
                            <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                                <b>Vivienda:</b> <?php echo $viv ?><br>
                                <b>Usuario:</b> <?php echo $usu ?><br>
                                <b>Referencia:</b> <?php echo $ref ?><br>
                                <b>Modalidad:</b> <?php echo $mod ?><br>
                                <b>Comentario:</b> <?php echo $com ?><br>
                            </p>
                        </div>
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <b>¡Cargando pago!</b> &nbsp;<i class="fas fa-cloud"></i>
                                <div class="text-white">Verifique por favor los datos antes de procesar el <strong>pago</strong>, ya que está acción no tiene manera de hacer reserva la acción.
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

    </div>

</div>

<!-- <script scr="../js/jquery_funcionamiento.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/validar.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'extraordinario'){

    $id_ref = $_SESSION['id_extra'];
    $_SESSION['pago'] = 'pago_extra';

    $sql = $conn->prepare("SELECT * FROM extraordinario_scs2_oxerev WHERE id_ref_scs2_rev = '$id_ref' AND view_scs2_rev = 1");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);

    $viv = $show->datae_vivienda_scs2_rev;
    $usu = $show->usuario_scs2_rev;
    $ref = $show->referencia_scs2_rev;
    $mod = $show->modalidad_scs2_rev;
    $com = $show->comentario_scs2_rev;

    $sqlC = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE user_scs0_rev = '$usu'");
    $sqlC->execute();
    $showC = $sqlC->fetch(PDO::FETCH_OBJ);
    $ema = $showC->correo_scs0_rev;
    $nom = $showC->nombre_scs0_rev;

?>

<div class="container">
    <h1>Confirmación de Pago Especial</h1>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="ex" id="ex" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Concepto</label>
                    <input type="text" class="form-control" name="co" id="co" placeholder="Pago especial de...">
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-danger">
                        <span class="icon text-white-50">
                            <i class="fas fa-eraser"></i>
                        </span>Limpiar
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                        <i class="fas fa-reply"></i>
                        </span>Solicitar Reenvio
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>Validar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">¿Deseas realizar la siguiente operación?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <b>Usuario:</b>&nbsp;<?php echo $usu ?> <br>
                            <b>Vivienda:</b>&nbsp;<?php echo $viv ?> <br></br>
                            Al <b>confirmar</b> este pago especial, será procesado y volverá al apartado de <b>Pago Especial</b> nuevamente para realizar nuevas acciones.
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="viv" id="viv" value="<?php echo $viv ?>">
                        <input type="hidden" name="usu" id="usu" value="<?php echo $usu ?>">
                        <input type="hidden" name="mod" id="mod" value="<?php echo $mod ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnConfirmar" id="btnConfirmar" data-bs-dismiss="modal">Procesar</button>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Solicitar Reenvio de Pago</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Solicitará el reenvio de datos a <strong><?php echo $nom ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <textarea class="form-control" id="sms_motivo" name="sms_motivo" rows="3" placeholder="Motivo del rechazo de datos"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="nom" id="nom" value="<?php echo $nom ?>">
                        <input type="hidden" name="ref" id="ref" value="<?php echo $ref ?>">
                        <input type="hidden" name="ema" id="ema" value="<?php echo $ema ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Solicitar</button>
                        </div>
                        </div>
                    </div>
                </div>


            </form>

            <br></br>
        </div>

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Pago Seleccionado</h6>
                </div>
                <div class="card-body">
                    <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                        <b>Vivienda:</b> <?php echo $viv ?><br>
                        <b>Usuario:</b> <?php echo $usu ?><br>
                        <b>Referencia:</b> <?php echo $ref ?> <br>
                        <b>Modalidad:</b> <?php echo $mod ?> <br>
                        <b>Comentario:</b> <?php echo $com ?> <br>
                    </p>
                </div>
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <b>¡Cargando pago extraordinario!</b> &nbsp;<i class="fas fa-cloud"></i>
                        <div class="text-white">Verifique por favor los datos antes de procesar el <strong>pago extraordinario</strong>, ya que está acción no tiene manera de hacer reserva la acción.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- <script scr="../js/jquery_funcionamiento.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/extra.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'alquiler'){

    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM  pagos_alquiler_scs10_oxerev WHERE id_ref_scs10_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $viv = $show->vivienda_scs10_rev;
    $ema = $show->correo_scs10_rev;
    $ref = $show->referencia_scs10_rev;
    $mod = $show->modalidad_scs10_rev;
    $com = $show->comentario_scs10_rev;
    $cod = $show->codigo_scs10_rev;

    $sql2 = $conn->prepare("SELECT * FROM  alquiler_scs6_oxerev WHERE codigo_scs6_rev = '$cod'");
    $sql2->execute();
    $date = $sql2->fetch(PDO::FETCH_OBJ);
    $id_alquiler = $date->id_ref_scs6_rev;
    $fecha = $date->fecha_scs6_rev;
    $correo_user = $date->correo_scs6_rev;
    $stt = $date->status_scs6_rev;
    $comentario = $date->comentario_scs6_rev;

    $_SESSION['id_alquiler'] = $id_alquiler;

?>

<div class="container">
    <h1>Confirmación de Pago por Alquiler</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Datos de Pago Seleccionado</h6>
                </div>
                <div class="card-body">
                        <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                        <b>Vivienda:</b> <?php echo $viv ?><br>
                        <b>Fecha:</b> <?php echo $fecha ?><br>
                        <b>Correo:</b> <?php echo $ema ?><br>
                        <b>Referencia:</b> <?php echo $ref ?> <br>
                        <b>Modalidad:</b> <?php echo $mod ?> <br>
                        <b>Comentario:</b> <?php echo $com ?> <br>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-12 text-center  ">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                        <i class="fas fa-reply"></i>
                        </span>Solicitar Reenvío
                    </button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>Validar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Reserva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La fecha a confirmar es: <strong><?php echo $fecha ?></strong></p>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="stt" id="stt" value="<?php echo $stt ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReservar" id="btnReservar" data-bs-dismiss="modal">Procesar</button>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Solicitar Reenvío de Pago</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Solicitará el reenvío de datos a <strong><?php echo $ema ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <textarea class="form-control" id="sms_motivo" name="sms_motivo" rows="3" placeholder="Motivo del rechazo de datos"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="stt" id="stt" value="<?php echo $stt ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $correo_user ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Solicitar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>

            <br></br>
        </div>
        </div>


</div>

<!-- <script scr="../js/jquery_funcionamiento.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/solicitud_revision.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'residencia'){

    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM pagos_kresidencia_scs11_oxerev WHERE id_ref_scs11_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $viv = $show->vivienda_scs11_rev;
    $ema = $show->correo_scs11_rev;
    $ref = $show->referencia_scs11_rev;
    $mod = $show->modalidad_scs11_rev;
    $com = $show->comentario_scs11_rev;

    $sql2 = $conn->prepare("SELECT * FROM kresidencia_scs7_oxerev WHERE vivienda_scs7_rev = '$viv'");
    $sql2->execute();
    $kresi = $sql2->fetch(PDO::FETCH_OBJ);
    $id_kresidencia = $kresi->id_ref_scs7_rev;
    $vivienda = $kresi->vivienda_scs7_rev;
    $correo = $kresi->correo_scs7_rev;
    $nombre = $kresi->nombre_scs7_rev;
    $cedula = $kresi->cedula_scs7_rev;
    $antiguedad = $kresi->antiguedad_scs7_rev;
    $membrete = $kresi->membrete_scs7_rev;
    $fecha = $kresi->fecha_scs7_rev;

    $_SESSION['id_kresidencia'] = $id_kresidencia;

?>

<div class="container">
    <h1>Confirmación de Carta de Residencia</h1>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Datos de Pago Seleccionado</h6>
                </div>
                <div class="card-body">
                        <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                        <b>Vivienda:</b> <?php echo $viv ?><br>
                        <b>Correo:</b> <?php echo $ema ?><br>
                        <b>Referencia:</b> <?php echo $ref ?> <br>
                        <b>Modalidad:</b> <?php echo $mod ?> <br>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-6">
                    <label class="form-label">Vivienda</label>
                    <input type="text" class="form-control" name="vivienda" id="vivienda" value="<?php echo $vivienda ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Membrete</label>
                    <input type="text" class="form-control" name="membrete" id="membrete" value="<?php echo $membrete ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cédula</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $cedula ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Antigüedad</label>
                    <input type="text" class="form-control" name="antiguedad" id="antiguedad" value="<?php echo $antiguedad ?>">
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-danger">
                        <span class="icon text-white-50">
                            <i class="fas fa-eraser"></i>
                        </span>Limpiar
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                        <i class="fas fa-reply"></i>
                        </span>Solicitar Reenvio
                    </button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>Validar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La Carta de Residencia será enviada al correo electrónico <strong><?php echo $correo ?></strong></p>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $correo ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReservar" id="btnReservar" data-bs-dismiss="modal">Procesar</button>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Solicitar Reenvío</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Solicitará el reenvio de datos a <strong><?php echo $ema ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <textarea class="form-control" id="sms_motivo" rows="3" placeholder="Motivo del rechazo de datos"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $correo ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Solicitar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>

            <br></br>
        </div>

    </div>
</div>

<!-- <script scr="../js/jquery_funcionamiento.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/solicitud_revision.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'solvencia'){

    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM solvencia_scs8_oxerev WHERE id_ref_scs8_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $id_ref = $show->id_ref_scs8_rev;
    $viv = $show->vivienda_scs8_rev;
    $ema = $show->correo_scs8_rev;
    $com = $show->comentario_scs8_rev;

    $sql2 = $conn->prepare("SELECT * FROM  usuarios_scs0_oxerev WHERE vivienda_scs0_rev = '$viv'");
    $sql2->execute();
    $deuda_viv = $sql2->fetch(PDO::FETCH_OBJ);
    $deuda = $deuda_viv->total_oxe;

    $_SESSION['id_solvencia'] = $id_ref;

?>

<div class="container">
    <h1>Confirmación de Solvencia</h1>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Datos Seleccionados</h6>
                </div>
                <div class="card-body">
                        <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                        <b>Vivienda:</b> <?php echo $viv ?><br>
                        <b>Correo:</b> <?php echo $ema ?><br>
                        <b>Comentario:</b> <?php echo $com ?> <br>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <?php
                    if($deuda == 0){
                ?>
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>Validar
                    </button>
                </div>
                <?php
                    } else {
                ?>
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>Solicitud Declinada
                    </button>
                </div>
                <?php
                    }
                ?>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Solicitud</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La Carta de Solvencia será enviada al correo electrónico <strong><?php echo $ema ?></strong></p>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReservar" id="btnReservar" data-bs-dismiss="modal">Procesar</button>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Solicitar Reenvío</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Aviso de rechazo de solvencia a <strong><?php echo $ema ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <input class="form-control" id="sms_motivo" value="Posee una deuda, por tal motivo es declinada su solicitud">
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $ema ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Solicitar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>

            <br></br>
        </div>

    </div>
</div>

<!-- <script scr="../js/jquery_funcionamiento.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/solicitud_revision.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'mudanza'){

    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM mudanza_scs9_oxerev WHERE id_ref_scs9_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $id_ref = $show->id_ref_scs9_rev;
    $vivienda = $show->vivienda_scs9_rev;
    $correo = $show->correo_scs9_rev;
    $nombre = $show->nombre_scs9_rev;
    $comentario = $show->comentario_scs9_rev;
    $fecha = $show->fecha_scs9_rev;

    $_SESSION['id_mudanza'] = $id_ref;

?>

<div class="container">
    <h1>Confirmación de Mudanza</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Datos Seleccionados</h6>
                </div>
                <div class="card-body">
                        <p><b>Número de Operación:</b> <?php echo $id_ref ?><br>
                        <b>Vivienda:</b> <?php echo $vivienda ?><br>
                        <b>Correo:</b> <?php echo $correo ?><br>
                        <b>Nombre:</b> <?php echo $nombre ?> <br>
                        <b>Fecha Solicitada:</b> <?php echo $fecha ?> <br>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- FORMULARIO DE CONFIRMACION DE ABONADO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                        <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                        </span>Declinar
                    </button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>Validar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
                <br>



                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La fecha confirmada es: <?php echo $fecha ?></p>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $correo ?>">
                        <input type="hidden" name="vivienda" id="vivienda" value="<?php echo $vivienda ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                        <input type="hidden" name="comentario" id="comentario" value="<?php echo $comentario ?>">
                        <input type="hidden" name="fecha" id="fecha" value="<?php echo $fecha ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReservar" id="btnReservar" data-bs-dismiss="modal">Procesar</button>
                        </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop1Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Declinar Petición</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Enviar la declinación a <strong><?php echo $correo ?></strong></p>
                            <label for="sms_motivo" class="form-label"><strong>Motivo</strong></label>
                            <textarea class="form-control" id="sms_motivo" name="sms_motivo" rows="3" placeholder="Motivo del rechazo"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?php echo $id_ref ?>">
                        <input type="hidden" name="correo_user" id="correo_user" value="<?php echo $correo ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-success" name="btnReenvio" id="btnReenvio" data-bs-dismiss="modal">Enviar</button>
                        </div>
                        </div>
                    </div>
                </div>

            </form>

            <br></br>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/solicitud_revision.js"></script>

<?php } else {
    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},4000);</script>';
    unset($_SESSION['id_extra']);
    unset($_SESSION['op_extra']);
?>

<!-- Inicio del contenido principal -->
<div class="container">
    <div class="row text-center col-lg-12 mb-4">
        <div class="card text-center shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-success">Error {validar[100]} Lo sentimos pero se ha encontrado un error de su solicitud <i class="fa-solid fa-database"></i></i></h3>
            </div>
        </div>
    </div>
</div>

<?php }

require_once '../vistas-admin/parte_inferior.php'; ?>