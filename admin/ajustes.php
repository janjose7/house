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
    <h1>Ajuste de Datos de los Usuarios</h1>
    <hr>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" value="Insertar" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-user-plus"></i>
                                </span>
                                &nbsp; Usuario Nuevo
                            </button>
                        </div>
                    </div><br>

                    <form id="datoHtml" method="POST">
                    <!-- Modal Insertar-->
                    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Creación de Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="Nom" placeholder="Nombre y Apellido" name="Nom" required>
                                                <label for="Nom">Nombre y Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="Viv" placeholder="Vivienda" name="Viv" pattern="[0-9]{2}[ -][0-9]{2}" title="El formato debe ser con '-', ej, 21-23 (EDIF-APTO)" required>
                                                <label for="Viv">Vivienda</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="Cor" placeholder="nombre@ejemplo.com" name="Cor" required>
                                                <label for="Cor">Correo Electrónico</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="Cla" placeholder="***********" name="Cla" required>
                                                <label for="Cla">Clave</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="Copro" name="Copro" aria-label="Copropietario" required>
                                                    <option value="Copropietario" selected>Copropietario</option>
                                                    <option value="Inquilino">Inquilino</option>
                                                    <option value="Propietario">Propietario</option>
                                                </select>
                                                <label for="Copro">Copropietario</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="Usu" placeholder="usuario_casa" name="Usu" required>
                                                <label for="Usu">Usuario</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="status"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="button" value="Crear" class="btn btn-success" name="cr" id="cr">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Vivienda</th>
                                            <th>Correo</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Vivienda</th>
                                            <th>Correo</th>
                                            <th>Editar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center">
                                        <?php foreach($registros as $usuario_rev){
                                            if($usuario_rev->rol_scs0_rev == 2){
                                                if($usuario_rev->correo_scs0_rev != ''){ ?>
                                        <tr>
                                            <td><?php echo $usuario_rev->nombre_scs0_rev ?></td>
                                            <td><?php echo $usuario_rev->vivienda_scs0_rev ?></td>
                                            <td><?php echo $usuario_rev->correo_scs0_rev ?></td>
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