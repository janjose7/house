<?php

//******* FONDO DE RESERVA ******/
$fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 1");
$fondos->execute();
$fondo = $fondos->fetch(PDO::FETCH_ASSOC);
$res_nomb = $fondo['nombre_fondo_scs12_rev'];
$res_mont = $fondo['monto_scs12_rev'];
$res_total = $res_mont + $op_fdp_bs - $egs_rsv;
//******* /FONDO DE RESERVA ******/

//******* FONDO DE PRESTACIONES ******/
$fondos = $conn->prepare("SELECT * FROM fondos_scs12_oxerev WHERE id_ref_scs12_rev = 2");
$fondos->execute();
$fondo = $fondos->fetch(PDO::FETCH_ASSOC);
$fdp_nomb = $fondo['nombre_fondo_scs12_rev'];
$fdp_mont = $fondo['monto_scs12_rev'];
$fdp_total = $fdp_mont + $op_res_bs - $egs_pst;
//******* /FONDO DE PRESTACIONES ******/


//$fnd_01 = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :fnd_01 WHERE id_ref_scs12_rev = 1");
//$fnd_01->execute(array(":fnd_01" => round($res_total, 2)));

//$fnd_02 = $conn->prepare("UPDATE fondos_scs12_oxerev SET monto_scs12_rev = :fnd_02 WHERE id_ref_scs12_rev = 2");
//$fnd_02->execute(array(":fnd_02" => round($fdp_total, 2)));

?>