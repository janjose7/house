<?php

session_start();

date_default_timezone_set('America/Caracas');

require_once 'config.php';

$instancia_tablas = new Conexion();
$conn = $instancia_tablas->Conectar();

$id = $_SESSION['rev_id'];
$email = $_SESSION['rev_correo'];
$nombre = $_SESSION['rev_conectado'];
$valor = isset($_POST['valor']) ? $_POST['valor'] : "0";
$comentario = trim(htmlentities(addslashes($_POST['comentario']))) ? $_POST['comentario'] : "";

$user = $conn->prepare("SELECT * FROM encuesta_opinion_scs_oxerev WHERE id_user_scs_rev = $id");
$user->execute();
$userId = $user->fetch(PDO::FETCH_OBJ);
$idUser = isset($userId->id_user_scs_rev) ? $userId->id_user_scs_rev : 0;

// CONTROL DE CUANTAS VECES PUEDE VOTAR UN USUARIO
$query = $conn->prepare("SELECT COUNT(id_user_scs_rev) FROM encuesta_opinion_scs_oxerev WHERE id_user_scs_rev = $id");
$query->execute();
$contador = $query->fetchColumn();

if($contador >= 0 && $contador <= 10){
    if($valor != "0"){
        switch($valor) {
            case '5':
                $gt = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 5");
                $gt->execute();
                $votado = $gt->fetch(PDO::FETCH_OBJ);
                $votos = $votado->votos_scs_rev;
                $rs = $votos + 1;
        
                $gtr = $conn->prepare("UPDATE encuesta_calidad_scs_oxerev SET votos_scs_rev = :voto WHERE id_ref_scs_rev = 5");
                $gtr->execute(array(":voto" => $rs));
        
                $rss = $conn->prepare("INSERT INTO encuesta_opinion_scs_oxerev (id_user_scs_rev, nombre_scs_rev, correo_scs_rev, comentario_scs_rev, valoracion_scs_rev) VALUES (:id, :nombre, :email, :comm, :rate)");
                $rss->execute(array(":id" => $id, ":nombre" => $nombre, ":email" => $email, ":comm" => $comentario, ":rate" => $valor));
        
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Gracias por Calificar el Sistema!</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $gt->closeCursor();
                $gtr->closeCursor();
                $rss->closeCursor();
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;

            case '4':
                $gt = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 4");
                $gt->execute();
                $votado = $gt->fetch(PDO::FETCH_OBJ);
                $votos = $votado->votos_scs_rev;
                $rs = $votos + 1;
        
                $gtr = $conn->prepare("UPDATE encuesta_calidad_scs_oxerev SET votos_scs_rev = :voto WHERE id_ref_scs_rev = 4");
                $gtr->execute(array(":voto" => $rs));
        
                $rss = $conn->prepare("INSERT INTO encuesta_opinion_scs_oxerev (id_user_scs_rev, nombre_scs_rev, correo_scs_rev, comentario_scs_rev, valoracion_scs_rev) VALUES (:id, :nombre, :email, :comm, :rate)");
                $rss->execute(array(":id" => $id, ":nombre" => $nombre, ":email" => $email, ":comm" => $comentario, ":rate" => $valor));
        
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Gracias por Calificar el Sistema!</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $gt->closeCursor();
                $gtr->closeCursor();
                $rss->closeCursor();
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;

            case '3':
                $gt = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 3");
                $gt->execute();
                $votado = $gt->fetch(PDO::FETCH_OBJ);
                $votos = $votado->votos_scs_rev;
                $rs = $votos + 1;
        
                $gtr = $conn->prepare("UPDATE encuesta_calidad_scs_oxerev SET votos_scs_rev = :voto WHERE id_ref_scs_rev = 3");
                $gtr->execute(array(":voto" => $rs));
        
                $rss = $conn->prepare("INSERT INTO encuesta_opinion_scs_oxerev (id_user_scs_rev, nombre_scs_rev, correo_scs_rev, comentario_scs_rev, valoracion_scs_rev) VALUES (:id, :nombre, :email, :comm, :rate)");
                $rss->execute(array(":id" => $id, ":nombre" => $nombre, ":email" => $email, ":comm" => $comentario, ":rate" => $valor));
        
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Gracias por Calificar el Sistema!</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $gt->closeCursor();
                $gtr->closeCursor();
                $rss->closeCursor();
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;

            case '2':
                $gt = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 2");
                $gt->execute();
                $votado = $gt->fetch(PDO::FETCH_OBJ);
                $votos = $votado->votos_scs_rev;
                $rs = $votos + 1;
        
                $gtr = $conn->prepare("UPDATE encuesta_calidad_scs_oxerev SET votos_scs_rev = :voto WHERE id_ref_scs_rev = 2");
                $gtr->execute(array(":voto" => $rs));
        
                $rss = $conn->prepare("INSERT INTO encuesta_opinion_scs_oxerev (id_user_scs_rev, nombre_scs_rev, correo_scs_rev, comentario_scs_rev, valoracion_scs_rev) VALUES (:id, :nombre, :email, :comm, :rate)");
                $rss->execute(array(":id" => $id, ":nombre" => $nombre, ":email" => $email, ":comm" => $comentario, ":rate" => $valor));
        
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Gracias por Calificar el Sistema!</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $gt->closeCursor();
                $gtr->closeCursor();
                $rss->closeCursor();
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;

            case '1':
                $gt = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 1");
                $gt->execute();
                $votado = $gt->fetch(PDO::FETCH_OBJ);
                $votos = $votado->votos_scs_rev;
                $rs = $votos + 1;
    
                $gtr = $conn->prepare("UPDATE encuesta_calidad_scs_oxerev SET votos_scs_rev = :voto WHERE id_ref_scs_rev = 1");
                $gtr->execute(array(":voto" => $rs));
        
                $rss = $conn->prepare("INSERT INTO encuesta_opinion_scs_oxerev (id_user_scs_rev, nombre_scs_rev, correo_scs_rev, comentario_scs_rev, valoracion_scs_rev) VALUES (:id, :nombre, :email, :comm, :rate)");
                $rss->execute(array(":id" => $id, ":nombre" => $nombre, ":email" => $email, ":comm" => $comentario, ":rate" => $valor));
        
                echo "<div id='alertaCerrar' class='alert alert-success alert-dismissible fade show' role='alert'><strong>¡Gracias por Calificar el Sistema!</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 2000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $gt->closeCursor();
                $gtr->closeCursor();
                $rss->closeCursor();
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;

            default:
                echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {adquirir[C01]} Ha Sucedido un error, lo sentimos</strong></div>";
                echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
                unset($id);
                unset($email);
                unset($nombre);
                $user->closeCursor();
                $query->closeCursor();
                $conn = null;
            break;
        }
    } elseif($valor == "0"){
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Por favor, seleccione una puntuación</strong></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    } else {
        echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {adquirir[C02]} Ha ocurrido un error inesperado</strong></div>";
        echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
        unset($id);
        unset($email);
        unset($nombre);
        $user->closeCursor();
        $query->closeCursor();
        $conn = null;
    }
} elseif($contador >= 11){
    echo "<div id='alertaCerrar' class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Usted ya ha Calificado el Sistema</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    unset($id);
    unset($email);
    unset($nombre);
    $user->closeCursor();
    $query->closeCursor();
    $conn = null;
} else {
    echo "<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error {adquirir[C03]} Ha ocurrido un error inesperado</strong></div>";
    echo '<script type="text/javascript">setTimeout(function(){$("#alertaCerrar").alert("close");}, 7000);</script>';
    unset($id);
    unset($email);
    unset($nombre);
    $user->closeCursor();
    $query->closeCursor();
    $conn = null;
}

?>