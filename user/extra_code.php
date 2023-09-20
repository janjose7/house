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

$_SESSION['id_extra'] = $_GET['id'];
$_SESSION['op_extra'] = $_GET['op'];

if(trim($_GET['op']) == 'pago_pex'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'mes'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'alqui'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'ticket'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'pago_pda'){
        header('Location: factura.php');
} elseif(trim($_GET['op']) == 'pago_pkr'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'pago_pdm'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'mudanza'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'solvencia'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'carta_cdr'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'recibo_mes'){
    header('Location: factura.php');
} elseif(trim($_GET['op']) == 'contacto_carta'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_pex'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_pcr'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_pda'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_mes'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_aql'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_mudanza'){
    header('Location: contacto.php');
} elseif(trim($_GET['op']) == 'contacto_solvencia'){
    header('Location: contacto.php');
} else {
    unset($_SESSION['id_extra']);
    unset($_SESSION['op_extra']);
    header('Location: error.php');
}



?>