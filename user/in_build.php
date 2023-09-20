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

?>
<div class="container-fluid">
    <h1 class="h1 mb-4 text-gray-800">En Construcción <i class="fa-solid fa-wrench"></i></h1>
</div>

<?php require_once '../vistas/parte_inferior.php'; ?>