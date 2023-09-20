<?php

// Incluir la biblioteca Simple HTML DOM
include_once('simple_html_dom.php');

// URL de la página web que deseamos escrapear
$url = 'https://exchangemonitor.net/dolar-venezuela';

// Cargar el contenido HTML de la página en una variable
$html = file_get_html($url);
//obtener el h1 de la web
$titulares = array();
foreach($html->find('h6') as $h6) {
    $titulares[] = $h6->plaintext;
}
// print_r($titulares);
// print_r($titulares[5]); // BCV

$valores = array();
foreach($html->find('p[class="precio"]') as $txt) {
    $valores[] = $txt->plaintext;
}
// print_r($valores);
// print_r($valores[5]); // BCV

$varianBs = array();
foreach($html->find('p[class="cambio-num"]') as $varBs) {
    $varianBs[] = $varBs->plaintext;
}
// print_r($varianBs);
// print_r($varianBs[5]); // BCV

$varianPor = array();
foreach($html->find('p[class="cambio-por"]') as $varPor) {
    $varianPor[] = $varPor->plaintext;
}
// print_r($varianPor);
// print_r($varianPor[5]); // BCV


// Liberar la memoria utilizada por Simple HTML DOM
$html->clear();
unset($html);

echo "$titulares[4]: $valores[4] Bs.| $varianBs[4] $varianPor[4]";
echo '<br>';
echo "$titulares[5]: $valores[5] Bs.| $varianBs[5] $varianPor[5]";

?>
