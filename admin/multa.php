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

$result = $conn->prepare("SELECT DISTINCT vivienda_scs0_rev FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2 AND correo_scs0_rev != '' ORDER BY vivienda_scs0_rev ASC");
$result->execute();

?>

<!-- Inicio del contenido principal -->

<div class="container">
    <h1>Asignación de Multa</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-6">
                    <label for="form_ifc" class="form-label">Infracción</label>
                    <select class="form-select form-control" id="form_ifc" name="form_ifc" onchange="mostrar(this.value)">
                        <option value="s00" selected></option>
                        <option value="apto_pcl">Multa Particular</option>
                        <option value="multa">Multa</option>
                    </select>
                </div>
                <div class="col-md-6 stattus" id="viv_apto" style="display: none;">
                    <label for="t1" class="form-label">Vivivenda</label>
                    <select class="form-select form-control" name="t1" id="t1">
                        <option value="Seleccione" selected>Seleccione EDIF-APTO</option>
                        <?php
                            while ($apto = $result->fetch(PDO::FETCH_ASSOC)){
                            ?>
                        <option value="<?php echo $apto['vivienda_scs0_rev'] ?>"><?php echo $apto['vivienda_scs0_rev']  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 stattus" id="mlt0" style="display: none;">
                    <label for="t0" class="form-label">Unidades Tributarias</label>
                    <input type="number" class="form-control" name="t0" id="t0" placeholder="123 U.T" step="any">
                </div>
                <div class="col-md-6 stattus" id="mlt1" style="display: none;">
                    <label for="t2" class="form-label">Concepto de Multa</label>
                    <input type="text" class="form-control" name="t2" id="t2" value="Multa por incumplimiento del reglamento">
                </div>
                <div class="col-md-6 stattus" id="pcl0" style="display: none;">
                    <label for="t0" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="t3" id="t3" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6 stattus" id="pcl1" style="display: none;">
                    <label for="t2" class="form-label">Concepto Particular</label>
                    <input type="text" class="form-control" name="t4" id="t4" value="Multa / Mora Particular">
                </div>
                <div class="col-12 text-center stattus" id="btnSolicitar" style="display: none;">
                    <button type="reset" class="btn btn-danger col-3" name="reset" id="reset" >
                        <span class="icon text-white-50">
                        <i class="fas fa-eraser"></i>
                        </span>Borrar
                    </button>
                    <button type="button" class="btn btn-success col-3" id="enviar" >
                        <span class="icon text-white-50">
                        <i class="fas fa-file-invoice-dollar"></i>
                        </span>Cargar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
            </form>
        </div>

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4 stattus" id="mlt2" style="display: none;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Cargo de Multa</h6>
                </div>
                <div class="card-body">
                    <p>Se puede multar a una vivienda en específica con la cantidad de unidades tributarias necesarias según sea el caso.</p>
                    <p><strong>Valor de la Unidad Tributaria: 50.41 Bs.D</strong></p>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4 stattus" id="pcl2" style="display: none;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Cargo Particular</h6>
                </div>
                <div class="card-body">
                    <p>Se realiza el cargo de una deuda singular a una vivienda según sea el caso.</p>
                </div>
            </div>

        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/solicitud_user.js"></script>
<script src="../js/multa.js"></script>

<?php require_once '../vistas-admin/parte_inferior.php'; ?>