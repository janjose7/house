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

$result = $conn->prepare("SELECT * FROM pagos_scs1_oxerev WHERE view_scs1_rev = 1");
$result->execute();

// MOSTRAR LOS USUARIOS
$registros = $result->fetchAll(PDO::FETCH_OBJ);


?>
<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Validar Pagos</h1>
</div>

    <form action="" method="POST">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Abonos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Referencia</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Referencia</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <?php foreach($registros as $usuario_rev) : ?>
                                        <tr>
                                            <td><?php echo $usuario_rev->datap_vivienda_scs1_rev ?></td>
                                            <td><?php echo $usuario_rev->referencia_scs1_rev ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <a href="extra_code.php?id=<?php echo $usuario_rev->id_ref_scs1_rev ?> & op=abono" class="btn btn-success btn-icon-split"><input type="button" class="btn btn-success" value="Validar">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-pen"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
    </form>
<!-- Fin del contenido principal -->


<?php require_once '../vistas-admin/parte_inferior.php'; ?>