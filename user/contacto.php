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


$instancia = new Conexion();
$conn = $instancia->Conectar();
//**** MOSTRAR DATOS DEL CONJUNTO, RESIDENCIA, TORRES, COUNTRY, ENTRE OTROS ****/
$resi = $conn->prepare("SELECT * FROM residencia_scsxx_oxerev WHERE id_ref_scsxx_rev = 1");
$resi->execute();
$residencia = $resi->fetch(PDO::FETCH_OBJ);
$residenciaCli = $residencia->residencia_scsxx_rev;
$nombreCli = $residencia->nombre_scsxx_rev;
$rifCli = $residencia->rif_scsxx_rev;
$direccionCli = $residencia->direccion_scsxx_rev;

$_SESSION['residencia_cli'] = $residenciaCli;
$_SESSION['nombreR_cli'] = $nombreCli;
$_SESSION['rif_cli'] = $rifCli;
$_SESSION['direccion_cli'] = $direccionCli;
//**** /MOSTRAR DATOS DEL CONJUNTO, RESIDENCIA, TORRES, COUNTRY, ENTRE OTROS ****/

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Centro de Ayuda y Sugerencia</h1>
</div>

<!-- Collapsable Card Example -->
<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-mb-4 py-3 border-bottom-success text-center">
                    <button class="btn btn-success" type="button"><span class="icon"><i class="fas fa-arrow-down"></i></span> Ayuda con el Administrador de su Condominio</button>
                </div>
                <form class="row g-3" method="POST" id="datoHtml">
                    <div class="card-body" >
                        <div class="mb-1">
                        <input type="text" class="form-control border-left-success" id="asunto_contacto" name="asunto_contacto" placeholder="Adquirir Servicio">
                        </div>
                        <div class="mb-3">
                            <label for="comentario_contacto" class="form-label">Mensaje</label>
                            <textarea class="form-control border-left-success" id="comentario_contacto" name="comentario_contacto" rows="3" placeholder="Disponibilidad Inmediata..."></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success me-md-2" type="button" id="ayuda" name="ayuda">Enviar&nbsp;<i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                        <div id="status" style="padding: 0.7em 0 0 0"></div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-mb-4 py-3 border-bottom-info text-center">
                    <button class="btn btn-info" type="button"><span class="icon"><i class="fas fa-arrow-down"></i></span> Ayuda y/o Sugerencia al Desarrollador</button>
                </div>
                <form class="row g-3" method="POST" id="datoHtml0">
                    <div class="card-body" >
                        <div class="mb-1">
                        <input type="text" class="form-control border-left-info" id="dev_contacto" name="dev_contacto" placeholder="Sugerencia">
                        </div>
                        <div class="mb-3">
                            <label for="dev_comentario" class="form-label">Mensaje</label>
                            <textarea class="form-control border-left-info" id="dev_comentario" name="dev_comentario" rows="3"></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-info me-md-2" type="button" id="ayuda_dev" name="ayuda_dev">Enviar&nbsp;<i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                        <div id="status0" style="padding: 0.7em 0 0 0"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/ayuda_contacto.js"></script>

<?php require_once '../vistas/parte_inferior.php'; ?>