<?php

session_start();

date_default_timezone_set('America/Caracas');

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

$int_com = new Conexion();
$conn = $int_com->Conectar();

?>

<div class="container">
    <h1>Solicitud</h1>
</div>

<div class="container">
<p></p>
    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-12">
                    <select class="form-select form-control" name="form_solicitud" id="form_solicitud" aria-label="Default select example" onchange="mostrar(this.value)">
                        <option value="s0"></option>
                        <option value="parque">Alquiler del Parque</option>
                        <option value="residencia">Carta de Residencia</option>
                        <option value="solvencia">Carta de Solvencia</option>
                        <option value="mudanza">Permiso de Mudanza</option>
                    </select>
                </div>
                <div class="col-md-6 stattus" id="parque1" style="display: none;">
                    <label class="form-label" for="aq1">Fecha <span style="color: #00ff00">*</span></label>
                    <input type="date" for="aq1" name="aq1" id="aq1" class="form-control">
                </div>
                <div class="col-md-6 stattus" id="parque2" style="display: none;">
                    <label for="" class="form-label">Comentario</label>
                    <input type="text" class="form-control" name="aq2" id="aq2" placeholder="Comentario">
                </div>
                <div class="col-md-12 stattus" id="solvencia3" style="display: none;">
                    <label for="" class="form-label">Comentario</label>
                    <input type="text" name="sv1" id="sv1" class="form-control" placeholder="Comentario">
                </div>
                <div class="col-md-6 stattus" id="residencia2" style="display: none;">
                    <label for="" class="form-label">Número de Identificación <span style="color: #00ff00">*</span></label>
                    <input type="text" name="rs1" id="rs1" class="form-control" placeholder="V-12.345.678   E-99.654.321">
                </div>
                <div class="col-md-6 stattus" id="residencia3" style="display: none;">
                    <label for="" class="form-label">Antigüedad <span style="color: #00ff00">*</span></label>
                    <input type="number" name="rs2" id="rs2" class="form-control" placeholder="Antigüedad" step="any">
                </div>
                <div class="col-md-6 stattus" id="residencia4" style="display: none;">
                    <label for="" class="form-label">Piso <span style="color: #00ff00">*</span></label>
                    <select class="form-select form-control" name="rs3" id="rs3" aria-label="Default select example">
                        <option value="P0"></option>
                        <option value="0">PB</option>
                        <option value="1">Piso 1</option>
                        <option value="2">Piso 2</option>
                        <option value="3">Piso 3</option>
                    </select>
                </div>
                <div class="col-md-6 stattus" id="residencia5" style="display: none;">
                    <label for="" class="form-label">Membrete</label>
                    <input type="text" name="rs4" id="rs4" class="form-control" placeholder="Dirigido a...">
                </div>
                <div class="col-md-6 stattus" id="mudanza1" style="display: none;">
                    <label class="form-label" for="mz1">Fecha <span style="color: #00ff00">*</span></label>
                    <input type="date" for="mz1" name="mz1" id="mz1" class="form-control">
                </div>
                <div class="col-md-6 stattus" id="mudanza2" style="display: none;">
                    <label for="" class="form-label">Comentario</label>
                    <input type="text" class="form-control" name="mz2" id="mz2" placeholder="Comentario">
                </div>
                <div class="col-12 stattus text-center" id="btnSolicitar" style="display: none;">
                        <button type="button" class="btn btn-success col-3" name="enviar" id="enviar" >
                            <span class="icon text-white-50">
                            <i class="fas fa-receipt"></i>
                            </span> Enviar
                        </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
            </form>
            <br>

        </div>

        <!-- ALQUILER DEL PARQUE -->
        <div class="col-lg-6 stattus" id="parque3" style="display: none;">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Alquiler del Parque <i class="fas fa-calendar-alt"></i></h6>
                </div>
                <div class="card-body">
                    <p class="text-justify">La fecha solicitada no tiene seguridad en ser reservada sí no es validado el pago correspondiente. <br> <strong>Costo de alquiler:</strong> 15$.
                    </p>
                    <p class="text-justify"><strong>Nota:</strong> Tiene 8 minutos para realizar el pago a tasa del <strong>B.C.V</strong>, antes que la sessión expire, de lo contrario, la fecha seleccionada estará disponible nuevamente. Debe de acudir a su condominio para <strong>el sello humedo y firma</strong> (sí aplica).</p>
                </div>
            </div>

        </div>
        <!-- CARTA DE RESIDENCIA -->
        <div class="col-lg-6 stattus" id="residencia6" style="display: none;">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Carta de residencia <i class="fas fa-file-contract"></i></h6>
            </div>
            <div class="card-body">
                <p class="text-justify">La Carta Residencial será enviada al correo electrónico asociado a su cuenta. De no tener su nombre completo previamente registrado ó tiene algún error en su nombre, le recomendamos dirigirse a <strong><a href="ajustes.php" style="text-decoration: none; color: #858796">Ajustes</a></strong> antes de realizar la solicitud. <br> <strong>Costo de la carta:</strong> 1.5$.</p>
                <p class="text-justify"><strong>Nota:</strong> Tiene 8 minutos para realizar el pago a tasa del <strong>B.C.V</strong>, antes que la sessión expire. Debe de acudir a su condominio para <strong>el sello humedo y firma</strong> (sí aplica).</p>
            </div>
        </div>

        </div>

        <!-- CARTA DE SOLVENCIA -->
        <div class="col-lg-6 stattus" id="solvencia4" style="display: none;">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Carta de Solvencia <i class="fas fa-file-invoice-dollar"></i></h6>
            </div>
            <div class="card-body">
                <p class="text-justify">Debe de acudir a su condominio para <strong>el sello humedo y firma</strong> (sí aplica).</p>
            </div>
        </div>

        </div>

        <!-- PERMISO DE MUDANZA -->
        <div class="col-lg-6 stattus" id="mudanza3" style="display: none;">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Permiso de Mudanza <i class="fas fa-truck-loading"></i></h6>
            </div>
            <div class="card-body">
                <p class="text-justify">Debe de acudir a su condominio para <strong>el sello humedo y firma</strong> (sí aplica).</p>
            </div>
        </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/solicitud_user.js"></script>
<script src="../js/solicitud_usuario.js"></script>

<?php require_once '../vistas/parte_inferior.php'; ?>