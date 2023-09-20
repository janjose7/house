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

if($_SESSION['op_extra'] == 'usuario'){
    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE id_scs0_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);

    $ID = $show->id_scs0_rev;
    $vivienda = $show->vivienda_scs0_rev;
    $usuario = $show->user_scs0_rev;
    $nombre = $show->nombre_scs0_rev;
    $correo = $show->correo_scs0_rev;

?>

<div class="container">
    <h1>Ajustes Datos del Usuario</h1>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" action="" id="datoHtml">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label" >Nombres</label><input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id_ref ?>" class="form-control">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo trim($nombre) ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo trim($usuario) ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo trim($correo) ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="***********">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Número de Vivienda</label>
                    <input type="text" class="form-control" id="vivienda" name="vivienda"  value="<?php echo trim($vivienda) ?>">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Copropietario</label>
                    <select  class="form-select form-control" id="person" name="person" >
                        <option>Seleccione</option>
                        <option value="Copropietario">Copropietario</option>
                        <option value="Inquilino">Inquilino</option>
                        <option value="Propietario">Propietario</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                            <i class="fas fa-sync-alt"></i>
                        </span>Actualizar
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                        </span>Borrar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>


                <!-- Modal de Borrar -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar permanentemente del usuario <strong><?php echo trim(htmlentities(addslashes($nombre))) ? $nombre : 'NULO' ?></strong> de la vivienda <strong><?php echo trim(htmlentities(addslashes($vivienda))) ? $vivienda : 'NULO' ?></strong>? No se podrá recuperar sus cuando complete esta acción.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" name="borrar" id="borrar" data-bs-dismiss="modal">Confirmar</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Todos los datos del usuario <strong><?php echo $nombre ?></strong> son correctos?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" name="actualizar" id="actualizar" data-bs-dismiss="modal">Confirmar</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Actualización de Datos</h6>
                </div>
                <div class="card-body">
                    <p>Los datos en este apartado son integramente personales, se aconseja
                        no compartir sus datos con terceros.
                    </p>
                </div>
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <strong>¡Advertencia!</strong> <i class="fas fa-exclamation-triangle"></i>
                        <p class="text-justify">Los datos son importante para los administrar correctamente. Verifique que todos los datos sean los correctos para ejecutar futuras acciones con exito.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/editar.js"></script>

<?php } elseif($_SESSION['op_extra'] == 'administrador'){
    $id_ref = $_SESSION['id_extra'];

    $sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE id_scs0_rev = '$id_ref'");
    $sql->execute();
    $show = $sql->fetch(PDO::FETCH_OBJ);
    $ID = $show->id_scs0_rev;
    $vivienda = $show->vivienda_scs0_rev;
    $usuario = $show->user_scs0_rev;
    $nombre = $show->nombre_scs0_rev;
    $correo = $show->correo_scs0_rev;

?>

<div class="container">
    <h1>Ajustes Datos del Usuario</h1>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" action="" id="datoHtml">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label" >Nombres</label><input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id_ref ?>" class="form-control">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo trim($nombre) ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo trim($usuario) ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo trim($correo) ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="***********">
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                            <i class="fas fa-sync-alt"></i>
                        </span>Actualizar
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                        </span>Borrar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>


                <!-- Modal de Borrar -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar permanentemente al administrador <strong><?php echo trim(htmlentities(addslashes($nombre))) ? $nombre : 'NULO' ?></strong>? No se podrá recuperar los cuando complete esta acción.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" name="borrar" id="borrar" data-bs-dismiss="modal">Confirmar</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Todos los datos del usuario <strong><?php echo trim(htmlentities(addslashes($nombre))) ? $nombre : 'NULO' ?></strong> son correctos?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" name="actualizar" id="actualizar" data-bs-dismiss="modal">Confirmar</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Actualización de Datos</h6>
                </div>
                <div class="card-body">
                    <p>Los datos en este apartado son integramente personales, se aconseja
                        no compartir sus datos con terceros.
                    </p>
                </div>
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        ¡Advertencia! <i class="fas fa-exclamation-triangle"></i>
                        <div class="text-white-50"><strong>Los datos son importante para los administrar correctamente. Verifique que todos los datos sean los correctos para ejecutar futuras acciones con exito.
                        </strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/edit.js"></script>
<?php } else {
        echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},4000);</script>';
        unset($_SESSION['id_extra']);
        unset($_SESSION['op_extra']);
        unset($_SESSION['us_extra']);
?>

<!-- index del contenido principal -->
<div class="container">
    <div class="row text-center col-lg-12 mb-4">
        <div class="card text-center shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-success">Error {editar[100]} Lo sentimos pero se ha encontrado un error de su solicitud <i class="fa-solid fa-database"></i></i></h3>
            </div>
        </div>
    </div>
</div>

<?php }

require_once '../vistas-admin/parte_inferior.php'; ?>