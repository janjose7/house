<?php

session_start();
if (!isset($_SESSION['rev_conectado'])) {
    header("Location: ../controlador/out.php");
} else if ($_SESSION['rev_rol'] == 1) {
    header("inicio.php");
} else {
    header("Location: ../controlador/out.php");
}


if (isset($_SESSION['view'])) {
    $_SESSION['view'] = $_SESSION['view'] + 1;
    echo 'deja de mostrarlo ';
    var_dump($_SESSION['view']);
} else {
    $_SESSION['view'] = 1;
    require_once 'ss.php';
}

var_dump(trim($_SESSION['view']));
$timezone  = -4; //(GMT -5:00) EST (U.S. & Canada)
    $hr = gmdate("j/m/Y H:i:s", time() + 3600*($timezone+date("I")));
?>

<html>
                    <body>
                        <h3>Verificación de OxeRev</h3><br>
                        <p><strong>Correo:&nbsp;</strong>$correo</p>
                        <p><strong>Nombre:&nbsp;</strong>$nombre</p>
                        <p><strong>Usuario:&nbsp;</strong>$user</p>
                        <p><strong>Contraseña:&nbsp;</strong>***********</p>
                        <br></br><hr>
                        <p>Su codigo de activación es <strong>$codigo</strong></p>
                        <p>Atentamente,</p>
                        <p><strong>Oxe</strong><strong style="color:rgb(248, 0, 0)">Rev</strong></p>
                        <p>No responda o reenvie correos a esta cuenta ya que es una cuenta no monitoreada. OxeRev nunca te enviará un correo en el cual use tu dirección de correo electrónico en el encabezando del mensaje, por ejemplo: Estimado(a) cliente: ryan.sainz@gmail.com</p>
                        <p>OxeRev no te enviará enlaces donde solicite información de claves de acceso a OxeRev, números telefónicos, cuentas bancarias, codigos ni información personal de cualquier indole.</p>
                        <p>Dispones del siguiente correo en caso de cualquier caso en el que requieras reportar cualquier situacion que considere sospechosa: micorreopersonalizado@oxerev.sol</p>
                        <hr>
                        <br>
                        <p><i>Fecha y Hora: <?php echo $hr ?></i></p>
                    </body>
                    </html>