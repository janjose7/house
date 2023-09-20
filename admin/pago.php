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

$result = $conn->prepare("SELECT * FROM procesado_scs3_oxerev");
$result->execute();

// MOSTRAR LOS USUARIOS
$registros = $result->fetchAll(PDO::FETCH_OBJ);


?>
<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Procesar pagos</h1>
    <hr>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Comprobantes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Monto</th>
                                            <th>Código</th>
                                            <th>Concepto</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Monto</th>
                                            <th>Código</th>
                                            <th>Concepto</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <?php

                                            foreach($registros as $usuario_rev)
                                                {
                                        ?>
                                        <tr>
                                            <td><?php echo $usuario_rev->vivienda_scs3_rev ?></td>
                                            <td><?php echo $usuario_rev->monto_scs3_rev ?></td>
                                            <td><?php echo $usuario_rev->codigo_scs3_rev ?></td>
                                            <td><?php echo $usuario_rev->concepto_scs3_rev ?></td>
                                            <td><?php echo $usuario_rev->fecha_scs3_rev ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $usuario_rev->id_ref_scs3_rev ?> & op=pago_comp" class="btn btn-success btn-icon-split"><input type="button" class="btn btn-success" value="Ver">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-alt"></i>
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


<?php require_once '../vistas-admin/parte_inferior.php'; ?>