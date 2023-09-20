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

$result = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev");
$result->execute();

// MOSTRAR LOS USUARIOS
$registros = $result->fetchAll(PDO::FETCH_OBJ);


?>
<!-- Inicio del contenido principal -->

<div class="container">
    <h1>Tabla de Viviendas</h1>
    <hr>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Viviendas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Abono</th>
                                            <th>Deuda</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Vivienda</th>
                                            <th>Abono</th>
                                            <th>Deuda</th>
                                            <th>Editar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <?php foreach($registros as $usuario_rev){
                                            if($usuario_rev->rol_scs0_rev == 2){
                                                if($usuario_rev->pro_in_scs0_rev == 'Propietario'){ ?>
                                        <tr>
                                            <td><?php echo $usuario_rev->vivienda_scs0_rev ?></td>
                                            <td><?php echo $usuario_rev->abono_oxe ?></td>
                                            <td><?php echo $usuario_rev->total_oxe ?></td>
                                            <td>
                                                <a href="extra_code.php?id=<?php echo $usuario_rev->id_scs0_rev ?> & us=<?php echo $usuario_rev->user_scs0_rev ?> & op=usuario" type="button" name="up" class="btn btn-warning btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }}}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/ajustes.js"></script>
<!-- Fin del contenido principal -->


<?php require_once '../vistas-admin/parte_inferior.php'; ?>