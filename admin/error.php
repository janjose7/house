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

unset($_SESSION['id_extra']);
unset($_SESSION['op_extra']);

header('refresh:11;url=index.php');

require_once '../vistas-admin/parte_superior.php';

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <div class="row text-center col-lg-12 mb-4">
        <div class="card text-center shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-success">Error {error[100]}Lo sentimos pero se ha encontrado un error de su solicitud <i class="fa-solid fa-database"></i></i></h3>
            </div>
        </div>
    </div>
</div>



<?php require_once '../vistas-admin/parte_inferior.php'; ?>