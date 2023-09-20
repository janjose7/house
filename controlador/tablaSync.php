<?php

require_once 'config.php';

date_default_timezone_set('America/Caracas');

$instancia = new Conexion();
$conn = $instancia->Conectar();

$consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev ORDER BY vivienda_scs0_rev ASC");
$consulta->execute();
$mostrar = $consulta->fetchAll(PDO::FETCH_OBJ);

    foreach($mostrar as $show){
        if($show->correo_scs0_rev == ''){
        echo '  
                        <td class="text-center">
                            ' . $show->vivienda_scs0_rev . '
                        </td>
                        <td class="text-center">
                            ' . $show->deuda_oxe . '
                        </td>
                        <td class="text-center">
                            ' . $show->abono_oxe . '
                        </td>';
    }}

?>
