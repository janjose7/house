<?php

session_start();
unset($_SESSION['rev_conectado']);
unset($_SESSION['rev_rol']);
unset($_SESSION['rev_vivienda']);
unset($_SESSION['rev_usuario']);
unset($_SESSION['rev_correo']);
unset($_SESSION['rev_id']);
unset($_SESSION['edif_nc']);
unset($_SESSION['a4']);
unset($_SESSION['a4_ncap']);
unset($_SESSION['id_extra']);
unset($_SESSION['op_extra']);
unset($_SESSION['us_extra']);
unset($_SESSION['recibo_lite']);
unset($_SESSION['recibo']);
unset($_SESSION['title']);
session_destroy();
header('Location: ../login.php');

?>