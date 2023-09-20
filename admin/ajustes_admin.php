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

$instancia = new Conexion();
$conex = $instancia->Conectar();

$oxe = $_SESSION['rev_id'];

$sql = $conex->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE id_scs0_rev = $oxe");
$sql->execute();

$show = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Ajustes del Usuario</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" action="" id="datoHtml">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $show['nombre_scs0_rev'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $show['user_scs0_rev'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $show['correo_scs0_rev'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="clave" id="clave" placeholder="***********">
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-success col-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="icon text-white-50">
                        <i class="fas fa-sync-alt"></i>
                        </span>Actualizar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>


                <!-- Modal de Actualizar -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Todos los datos son correctos?
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
                    <h6 class="m-0 font-weight-bold text-success">Actualización de Datos Personales</h6>
                </div>
                <div class="card-body">
                    <p class="text-justify">Los datos en este apartado son integramente personales, se aconseja
                        no compartir sus datos con terceros.
                    </p>
                </div>
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        <strong>¡Cuidado!</strong> <i class="fas fa-exclamation-triangle"></i>
                        <p class="text-justify">Sus datos son importante para los administradores.
                            Para solicitar modificar su número de vivienda, por favor envie un correo electrónico ó dirijase a su administrador de condominio.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/ajustes_user.js"></script>
<!-- Fin del contenido principal -->

<?php require_once '../vistas-admin/parte_inferior.php'; ?>