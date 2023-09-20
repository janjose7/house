<?php

require_once 'config.php';

date_default_timezone_set('America/Caracas');

$instancia = new Conexion();
$conn = $instancia->Conectar();

$consulta = $conn->prepare("SELECT * FROM tasa_scs13_oxerev");
$consulta->execute();
$mostrar = $consulta->fetchAll(PDO::FETCH_OBJ);

echo "  <div class='table-responsive'>
            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <theader>
                    <tr class='active text-center'>
                        <th>Nombre de la Divisa</th>
                        <th>Valor</th>
                    </tr>
                </theader>";

    foreach($mostrar as $dvs){
        if($dvs->id_scs13_rev == 1){
        echo '  <tr>
                    <td class="text-center">
                        ' . $dvs->divisa_scs13_rev . '
                    </td>
                    <td class="text-center">
                        ' . $dvs->	tasa_actual_scs13_rev . '
                    </td>
                </tr>';
    }}
    echo " </table></div>";

?>
