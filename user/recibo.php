<?php

session_start();

date_default_timezone_set('America/Caracas');

if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 2)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}

require_once '../vistas/parte_superior.php';
require_once '../controlador/config.php';

$int_com = new Conexion();
$conn = $int_com->Conectar();

$result = $conn->prepare("SELECT * FROM recibo_scs4_oxerev");
$result->execute();
$recibo = $result->fetchAll(PDO::FETCH_OBJ);

?>
<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Recibo del Mes</h1>
    <hr>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Abonos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Recibo</th>
                                            <th>Codigo</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Recibo</th>
                                            <th>Codigo</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <?php foreach($recibo as $rec){
                                            $datef = date_create($rec->fecha_scs4_rev);
                                            $fecha =  date_format($datef, "m-Y"); ?>
                                        <tr>
                                            <td><?php echo $rec->id_ref_scs4_rev ?></td>
                                            <td><?php echo $rec->codigo_scs4_rev ?></td>
                                            <td><?php echo $rec->totalPro ?></td>
                                            <td><?php echo $fecha ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $rec->id_ref_scs4_rev ?> & op=recibo_mes" class="btn btn-success btn-icon-split"><input type="button" class="btn btn-success" value="Ver">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<!-- Fin del contenido principal -->


<?php require_once '../vistas/parte_inferior.php'; ?>