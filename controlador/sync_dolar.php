<?php

include_once('../html/simple_html_dom.php');

date_default_timezone_set('America/Caracas');

$html = file_get_html('https://exchangemonitor.net/dolar-venezuela');

$titulares = array();
foreach($html->find('h6') as $h6) {
    $titulares[] = $h6->plaintext;
}

$valores = array();
foreach($html->find('p[class="precio"]') as $txt) {
    $valores[] = $txt->plaintext;
}

$varianBs = array();
foreach($html->find('p[class="cambio-num"]') as $varBs) {
    $varianBs[] = $varBs->plaintext;
}

$varianPor = array();
foreach($html->find('p[class="cambio-por"]') as $varPor) {
    $varianPor[] = $varPor->plaintext;
}


$html = file_get_html('https://exchangemonitor.net/dolar-venezuela/EUR');

$titular = array();
foreach($html->find('h6') as $h6) {
    $titular[] = $h6->plaintext;
}

$valor = array();
foreach($html->find('p[class="precio"]') as $txt) {
    $valor[] = $txt->plaintext;
}

$varianBs_eur = array();
foreach($html->find('p[class="cambio-num"]') as $varBs) {
    $varianBs_eur[] = $varBs->plaintext;
}

$varianPor_eur = array();
foreach($html->find('p[class="cambio-por"]') as $varPor) {
    $varianPor_eur[] = $varPor->plaintext;
}

// Liberar la memoria utilizada por Simple HTML DOM
$html->clear();
unset($html);


$cambio1 = str_replace(',', '[c]', $valores[5]);
$cambio1 = str_replace('.', ',', $cambio1);
$cambio1 = str_replace('[c]', '.', $cambio1);

$cambio0 = str_replace(',', '[c]', $valores[4]);
$cambio0 = str_replace('.', ',', $cambio0);
$cambio0 = str_replace('[c]', '.', $cambio0);

$cambio2 = str_replace(',', '[c]', $valor[5]);
$cambio2 = str_replace('.', ',', $cambio2);
$cambio2 = str_replace('[c]', '.', $cambio2);

$resultado = $conn->prepare("UPDATE tasa_scs13_oxerev SET tasa_actual_scs13_rev = :cambio, var_por_scs13_rev = :porcentaje, var_bs_scs13_rev = :bs WHERE id_scs13_rev = 1");
$resultado->execute(array(":cambio" => $cambio1, ":porcentaje" => $varianPor[5], ":bs" => $varianBs[5]));

$resultado = $conn->prepare("UPDATE tasa_scs13_oxerev SET tasa_actual_scs13_rev = :cambio, var_por_scs13_rev = :porcentaje, var_bs_scs13_rev = :bs WHERE id_scs13_rev = 2");
$resultado->execute(array(":cambio" => $cambio0, ":porcentaje" => $varianPor[4], ":bs" => $varianBs[4]));

$resultado = $conn->prepare("UPDATE tasa_scs13_oxerev SET tasa_actual_scs13_rev = :cambio, var_por_scs13_rev = :porcentaje, var_bs_scs13_rev = :bs WHERE id_scs13_rev = 3");
$resultado->execute(array(":cambio" => $cambio2, ":porcentaje" => $varianPor_eur[5], ":bs" => $varianBs_eur[5]));


?>