<?php

require_once 'config.php';

date_default_timezone_set('America/Caracas');

$instancia = new Conexion();
$conn = $instancia->Conectar();

$consulta = $conn->prepare("SELECT * FROM fondos_scs12_oxerev ORDER BY nombre_fondo_scs12_rev ASC");
$consulta->execute();
$mostrar = $consulta->fetchAll(PDO::FETCH_OBJ);

echo "  <div class='table-responsive'>
            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <theader>
                    <tr class='active text-center'>
                        <th>Nombre del Fondo</th>
                        <th>Monto</th>
                    </tr>
                </theader>";

    foreach($mostrar as $show){
        echo '  <tr>
                    <td class="text-center">
                        ' . $show->nombre_fondo_scs12_rev . '
                    </td>
                    <td class="text-center">
                        ' . $show->	monto_scs12_rev . '
                    </td>
                </tr>';
    }
    echo " </table></div>";

?>
