<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 1)
{
    header("../index.php");
} else {
    header("Location: ../../controlador/out.php");
}

require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$doc = new Dompdf();

$a4 = $_SESSION['a4'];
$name = $_SESSION['title'];

$doc->setPaper('A4', 'portrait');
$doc->loadHtml($a4);
$doc->render();
$doc->stream($name, array("Attachment" => true));

?>