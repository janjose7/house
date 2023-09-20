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
date_default_timezone_set('America/Caracas');

$_SESSION['title'] = 'Recibo Nuevo_' . date('d-m-Y');


if(isset($_SESSION['recibo']) && empty($_SESSION['a4_ncap']) == true && empty($_SESSION['edif_nc']) == false){
?>

<!-- Inicio del contenido principal -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-success">¡Recibo Cargado con Exito!</h5>
        </div>
        <div class="card-body">
            <p class="text-center">
                <a href="pdf/ev.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: rgba(0,163,224,1)">&nbsp;<i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;Envío de Correo Masivo&nbsp;</a>
                <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: #00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
                <a href="index.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
            </p>
            <?php echo $_SESSION['a4'] ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php

} elseif(isset($_SESSION['recibo']) && empty($_SESSION['a4_ncap']) == true && empty($_SESSION['edif_nc']) == true){

?>

    <!-- Inicio del contenido principal -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-success">¡Recibo Cargado con Éxito!</h5>
            </div>
            <div class="card-body">
                <p class="text-center">
                    <a href="pdf/ev1.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: rgba(0,163,224,1)">&nbsp;<i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;Envío de Correo Masivo&nbsp;</a>
                    <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: #00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
                    <a href="index.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
                </p>
                <?php echo $_SESSION['a4'] ?>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php } elseif(isset($_SESSION['recibo']) && empty($_SESSION['a4_ncap']) == false && empty($_SESSION['edif_nc']) == false){

?>

    <!-- Inicio del contenido principal -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-success">¡Recibo Cargado con Éxito!</h5>
            </div>
            <div class="card-body">
                <p class="text-center">
                    <a href="pdf/ev01.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: rgba(0,163,224,1)">&nbsp;<i class="fa fa-file-arrow-up"></i>&nbsp;Envío de Correo Masivo&nbsp;</a>
                    <a href="pdf/ver.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: #00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
                    <a href="index.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
                </p>
                <?php echo $_SESSION['a4'] ?>
                <br>
                <br>
                <p class="text-center">
                    <a href="pdf/ver1.php" target="_blank" rel="noopener noreferrer" class="btn btn-light py-3" style="color: #00ff00">&nbsp;<i class="fa fa-file-arrow-down"></i>&nbsp;Descargar&nbsp;</a>
                    <a href="index.php" rel="noopener noreferrer" class="btn btn-primary py-3">&nbsp;<i class="fas fa-home"></i>&nbsp;Inicio&nbsp;</a>
                </p>
                <?php echo $_SESSION['a4_ncap'] ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php } else {

    echo '<script type="text/javascript">setTimeout(function(){window.location.href = "index.php";history.forward();history.pushState(null, "", "index.php");},1000);</script>';

?>
<!-- Inicio del contenido principal -->
<div class="container">
    <div class="row text-center col-lg-12 mb-4">
        <div class="card text-center shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-success">Error {ver_mes[100]} Lo sentimos pero se ha encontrado un error de su solicitud <i class="fa-solid fa-database"></i></h3>
            </div>
        </div>
    </div>
</div>

<?php }
require_once '../vistas-admin/parte_inferior.php'; ?>