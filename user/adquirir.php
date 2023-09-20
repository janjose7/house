<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 2)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}

require_once '../vistas/parte_superior.php';
require_once '../controlador/config.php';

$instancia = new Conexion();
$conn = $instancia->Conectar();

$show1 = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 1");
$show1->execute();
$votos1 = $show1->fetch(PDO::FETCH_OBJ);
$v1 = trim($votos1->votos_scs_rev) ? $votos1->votos_scs_rev : '';

$show2 = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 2");
$show2->execute();
$votos2 = $show2->fetch(PDO::FETCH_OBJ);
$v2 = trim($votos2->votos_scs_rev) ? $votos2->votos_scs_rev : '';

$show3 = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 3");
$show3->execute();
$votos3 = $show3->fetch(PDO::FETCH_OBJ);
$v3 = trim($votos3->votos_scs_rev) ? $votos3->votos_scs_rev : '';

$show4 = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 4");
$show4->execute();
$votos4 = $show4->fetch(PDO::FETCH_OBJ);
$v4 = trim($votos4->votos_scs_rev) ? $votos4->votos_scs_rev : '';

$show5 = $conn->prepare("SELECT * FROM encuesta_calidad_scs_oxerev WHERE id_ref_scs_rev = 5");
$show5->execute();
$votos5 = $show5->fetch(PDO::FETCH_OBJ);
$v5 = trim($votos5->votos_scs_rev) ? $votos5->votos_scs_rev : '';

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Adquirir Servicio</h1>
</div>

<!-- Collapsable Card Example -->
<div class="container">
    <div class="row">
        <!-- Caja de Contacto co el Codominio -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-mb-4 py-3 border-bottom-info text-center">
                    <button class="btn btn-info" type="button"><span class="icon"><i class="fa-solid fa-rocket"></i> </span> Adquirir el Servicio</button>
                </div>
                <form class="row g-3" method="POST" id="datoHtml2">
                    <div class="card-body" >
                        <div class="mb-1">
                        <input type="text" class="form-control border-left-info" id="issue" name="issue" value="Adquirir Servicio">
                        </div>
                        <div class="mb-3">
                            <label for="sms_comentario" class="form-label">Mensaje</label>
                            <textarea class="form-control border-left-info" id="sms_comentario" name="sms_comentario" rows="3" placeholder="Disponibilidad Inmediata..."></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-info me-md-2" type="button" id="adquirir" name="adquirir">Enviar&nbsp;<i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                        <div id="status2" style="padding: 0.7em 0 0 0"></div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Caja de Votación -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-mb-4 py-3 border-bottom-success text-center">
                    <button class="btn btn-success" type="button"><span class="icon"><i class="fas fa-chart-line"></i> </span> Calificar Servicio</button>
                </div>
                <form method="POST" id="datoHtml3" action="">
                    <div class="card-body" >
                        <div class="card mb-4 border-left-success">
                            <div class="card-body">
                                <input type="radio" name="valor" id="valor" value="5">&nbsp;<label for="" class="form-label">5 Extrellas <i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i></label><br>
                                <input type="radio" name="valor" id="valor" value="4">&nbsp;<label for="" class="form-label">4 Estrellas <i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i></label><br>
                                <input type="radio" name="valor" id="valor" value="3">&nbsp;<label for="" class="form-label">3 Estrellas <i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i></label><br>
                                <input type="radio" name="valor" id="valor" value="2">&nbsp;<label for="" class="form-label">2 Estrellas <i class="fas fa-star" style="color:yellow"></i><i class="fas fa-star" style="color:yellow"></i></label><br>
                                <input type="radio" name="valor" id="valor" value="1">&nbsp;<label for="" class="form-label">1 Estrella <i class="fas fa-star" style="color:yellow"></i></label><br>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario</label>
                            <textarea class="form-control border-left-success" id="comentario" name="comentario" rows="2" placeholder="Opcional"></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" id="voto" class="btn btn-success me-md-2">¡Votar!&nbsp;<i class="fa-solid fa-check-to-slot"></i></button>
                        </div>
                        <div id="status3" style="padding: 0.7em 0 0 0"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Votos - Calificación <i class="fa-solid fa-square-poll-vertical"></i></h6>
                </div>
                <div class="card-body text-center">
                    <div id='Dona'><!-- Plotly chart will be drawn inside this DIV --></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/adquirir.js"></script>
<script>
    var data = [{
        type: "pie",
        values: [<?php echo $v1 ?>, <?php echo $v2 ?>, <?php echo $v3 ?>, <?php echo $v4 ?>, <?php echo $v5 ?>],
        labels: ["1 Estrella", "2 Estrellas", "3 Estrellas", "4 Estrellas", "5 Estrellas"],
        textinfo: "label+percent",
        insidetextorientation: "radial"
    }]

    var layout = [{
        height: 400,
        width: 400
    }]

    Plotly.newPlot('Dona', data, layout)
</script>
<!-- Fin del contenido principal -->

<?php require_once '../vistas/parte_inferior.php'; ?>