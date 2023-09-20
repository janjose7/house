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

$_SESSION['id_extra'] = $_GET['id'];
$_SESSION['op_extra'] = $_GET['op'];
$_SESSION['us_extra'] = $_GET['us'];

if(trim($_GET['op']) == 'abono'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'administrador'){
    header('Location: editar.php');
} elseif(trim($_GET['op']) == 'alquiler'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'extraordinario'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'mudanza'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'usuario'){
    header('Location: editar.php');
} elseif(trim($_GET['op']) == 'residencia'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'solvencia'){
    header('Location: validar.php');
} elseif(trim($_GET['op']) == 'pago_comp'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'tiquet'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'alq'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'kre'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'sol'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'mud'){
    header('Location: ver.php');
} elseif(trim($_GET['op']) == 'rec_mes'){
    header('Location: ver.php');
} else {
    header('Location: error.php');
}



?>