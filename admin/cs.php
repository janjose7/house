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

?>

<div class="container">
    <h1>Comprobantes Procesados</h1>
</div>

<div id="status"></div>

<div class="container">
<p></p>
    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-12">
                    <select class="form-select form-control" name="form_solicitud" id="form_solicitud" aria-label="Default select example" onchange="mostrar(this.value)">
                        <option value="s0"></option>
                        <option value="parque">Alquiler del Parque</option>
                        <option value="residencia">Carta de Residencia</option>
                        <option value="solvencia">Carta de Solvencia</option>
                        <option value="mudanza">Permiso de Mudanza</option>
                    </select>
                </div>
            </form>
            <br>

        </div>

        <!-- ALQUILER DEL PARQUE -->
        <div class="container-fluid stattus" id="parque3" style="display: none;">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Alquileres</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Fecha</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Fecha/th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                    <?php
                                        $result = $conn->prepare("SELECT * FROM alquiler_scs6_oxerev");
                                        $result->execute();
                                        // MOSTRAR LOS USUARIOS
                                        $registros = $result->fetchAll(PDO::FETCH_OBJ);
                                        foreach($registros as $alquiler_rev){
                                            if($alquiler_rev->status_scs6_rev == 'Aprobado'){
                                    ?>
                                        <tr>
                                            <td><?php echo $alquiler_rev->id_ref_scs6_rev ?></td>
                                            <td><?php echo $alquiler_rev->fecha_scs6_rev ?></td>
                                            <td><?php echo $alquiler_rev->codigo_scs6_rev ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $alquiler_rev->id_ref_scs6_rev?> & op=alq" type="button" name="up" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="text">Ver</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
        
        <!-- CARTA DE RESIDENCIA -->
        <div class="container-fluid stattus" id="residencia5" style="display: none;">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Cartas de Residencia</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                    <?php
                                        $result = $conn->prepare("SELECT * FROM kresidencia_scs7_oxerev");
                                        $result->execute();
                                        // MOSTRAR LOS USUARIOS
                                        $registros = $result->fetchAll(PDO::FETCH_OBJ);
                                        foreach($registros as $residencia_rev){
                                            if($residencia_rev->view_scs7_rev == 0){
                                    ?>
                                        <tr>
                                            <td><?php echo $residencia_rev->id_ref_scs7_rev ?></td>
                                            <td><?php echo $residencia_rev->vivienda_scs7_rev ?></td>
                                            <td><?php echo $residencia_rev->codigo_scs7_rev ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $residencia_rev->id_ref_scs7_rev ?> & op=kre" type="button" name="up" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="text">Ver</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>

        <!-- CARTA DE SOLVENCIA -->
        <div class="container-fluid stattus" id="solvencia4" style="display: none;">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Cartas de Solvencia</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                    <?php
                                        $result = $conn->prepare("SELECT * FROM solvencia_scs8_oxerev");
                                        $result->execute();
                                        // MOSTRAR LOS USUARIOS
                                        $registros = $result->fetchAll(PDO::FETCH_OBJ);
                                        foreach($registros as $alquiler_rev){
                                            if($alquiler_rev->view_scs8_rev == 0){
                                    ?>
                                        <tr>
                                            <td><?php echo $alquiler_rev->id_ref_scs8_rev ?></td>
                                            <td><?php echo $alquiler_rev->vivienda_scs8_rev ?></td>
                                            <td><?php echo $alquiler_rev->codigo_scs8_rev ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $alquiler_rev->id_ref_scs8_rev?> & op=sol" type="button" name="up" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="text">Ver</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        </div>

        <!-- PERMISO DE MUDANZA -->
        <div class="container-fluid stattus" id="mudanza3" style="display: none;">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Cartas de Mudanza</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>N<sup>o</sup> Operación</th>
                                            <th>Vivienda</th>
                                            <th>Código</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                    <?php
                                        $result = $conn->prepare("SELECT * FROM mudanza_scs9_oxerev");
                                        $result->execute();
                                        // MOSTRAR LOS USUARIOS
                                        $registros = $result->fetchAll(PDO::FETCH_OBJ);
                                        foreach($registros as $mudanza_rev){
                                            if($mudanza_rev->status_scs9_rev == 'Aprobado'){
                                    ?>
                                        <tr>
                                            <td><?php echo $mudanza_rev->id_ref_scs9_rev ?></td>
                                            <td><?php echo $mudanza_rev->vivienda_scs9_rev ?></td>
                                            <td><?php echo $mudanza_rev->codigo_scs9_rev ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $mudanza_rev->id_ref_scs9_rev?> & op=mud" type="button" name="up" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-alt"></i>
                                                    </span>
                                                    <span class="text">Ver</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/solicitud_user.js"></script>

<?php require_once '../vistas-admin/parte_inferior.php'; ?>