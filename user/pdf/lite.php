<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 2)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}

require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$doc = new Dompdf();

$name = $_SESSION['title'];
$b8  = $_SESSION['b8'];

$doc->setPaper('B8', 'landscape');
$doc->loadHtml($b8);
$doc->render();
$doc->stream($name, array("Attachment" => true));


?>