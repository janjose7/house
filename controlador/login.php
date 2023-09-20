<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';

$instancia_login = new Conexion();
$conn = $instancia_login->Conectar();

    // TOMA DE DATOS DEL LOGIN
    $usuario_oxe = trim(htmlentities(addslashes(isset($_POST['userev'])))) ? $_POST['userev'] : '';
    $clave_rev = trim(htmlentities(addslashes(isset($_POST['passrev'])))) ? $_POST['passrev'] : '';

    $usuario_rev = strtolower($usuario_oxe);

    $query = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = :correo_scs0_rev OR user_scs0_rev = :user_scs0_rev");
    $query->bindParam("correo_scs0_rev", $usuario_rev, PDO::PARAM_STR);
    $query->bindParam("user_scs0_rev", $usuario_rev, PDO::PARAM_STR);
    $query->execute();

    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if(!$resultado){
        echo "<div class='alert alert-danger' role='alert'>Correo ó usuario incorrecto</div>";
    } else {
        if(empty(password_verify($clave_rev, $resultado['clave_scs0_rev']))){
            echo "<div class='alert alert-danger' role='alert'>Contraseña incorrecta</div>";
        }
        else if(password_verify($clave_rev, $resultado['clave_scs0_rev'])){
            if($resultado['status_scs0_rev'] == ''){
                echo "<div class='alert alert-warning' role='alert'>Debe de verificar su cuenta </div><br><a href='solicitud.php'>Solicitar código</a>";
            } if($resultado['status_scs0_rev'] == 'noVerificado'){
                echo "<div class='alert alert-warning' role='alert'>Debe de verificar su cuenta </div><br><a href='solicitud.php'>Solicitar código</a>";
            } elseif($resultado['status_scs0_rev'] == 'Verificado'){
                $_SESSION['rev_conectado'] = ucwords($resultado['nombre_scs0_rev']);
                $_SESSION['rev_rol'] = $resultado['rol_scs0_rev'];
                $_SESSION['rev_vivienda'] = $resultado['vivienda_scs0_rev'];
                $_SESSION['rev_usuario'] = $resultado['user_scs0_rev'];
                $_SESSION['rev_correo'] = $resultado['correo_scs0_rev'];
                $_SESSION['rev_id'] = $resultado['id_scs0_rev'];
                switch($_SESSION['rev_rol']){
                    case 1:
                        echo "<script>setTimeout(function(){window.location.href = 'admin/index.php';history.forward();history.pushState(null, '', 'admin/index.php');},70);</script>";
                        break;

                    case 2:
                        echo "<script>setTimeout(function(){window.location.href = 'user/index.php';history.forward();history.pushState(null, '', 'user/index.php');},70);</script>";
                        break;

                    default:
                    echo "<div class='alert alert-danger' role='alert'>Error {login[C01]}, solicitud no válida</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error {login[C02]}, hubo un problema</div>";
            }
        }
}

?>