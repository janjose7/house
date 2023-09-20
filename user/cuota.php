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

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Pagos de Cuota</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <form method="POST" class="row g-3" id="datoHtml">
                <div class="col-md-6">
                    <label for="numero_referencia" class="form-label">Referencia <span style="color: #00ff00">*</span></label>
                    <input type="text" class="form-control" name="referencia" id="numero_referencia" placeholder="N° de Referencia">
                </div>
                <!-- <div class="mb-3">
                    <select class="form-select form-control" name="banco" id="banco" aria-label="Default select example">
                        <option value="nulo">¿Con cúal banco o institución realizó la operación?</option>
                        <option value="Banesco">Banesco</option>
                        <option value="100% Banco">100% Banco</option>
                        <option value="Bancamiga">Bancamiga</option>
                        <option value="Bancaribe">Bancaribe</option>
                        <option value="Banco Activo">Banco Activo</option>
                        <option value="Banco Bicentenario">Banco Bincentenario</option>
                        <option value="Banco Caroni">Banco Caroni</option>
                        <option value="Banco FANB">Banco de la FANB</option>
                        <option value="BDV">Banco de Venexuela</option>
                        <option value="Banco del Tesoro">Banco del Tesoro</option>
                        <option value="Banco Exterior">Banco Exterior</option>
                        <option value="Banco Mercantil">Banco Mercantil</option>
                        <option value="BNC">Banco Nacional de credito</option>
                        <option value="BOD">Banco Occidental de Descuento</option>
                        <option value="Banco Plaza">Banco Plaza</option>
                        <option value="Banco Provincial">Banco Provincial</option>
                        <option value="Banco Sofitasa">Banco Sofitasa</option>
                        <option value="Bancrecer">Bancrecer</option>
                        <option value="Banplus">Banplus</option>
                        <option value="BFC">Banco Fondo Comun</option>
                        <option value="Banco Delsur">Banco Delsur</option>
                        <option value="Mi Banco">mi Banco</option>
                        <option value="BVC">Banco Venezolano de Credito</option>
                    </select>
                </div> -->
                <div class="col-md-6">
                    <label for="metodo" class="form-label">Método <span style="color: #00ff00">*</span></label>
                    <select class="form-select form-control" name="metodo" id="metodo">
                        <option value="nulo">Método de pago</option>
                        <option value="Pago Movil">Pago Móvil</option>
                        <option value="Transferencia">Transferencia</option>
                        <!-- DE TENER MAS METODOS DE PAGOS, SERAN ANEXADOS
                            <option value="3">Three</option> -->
                    </select>
                </div>
                <div class="col-12">
                    <label for="comentario" class="form-label">Comentario</label>
                    <input type="text" class="form-control" name="comentario" id="comentario" value="Pago de la vivienda <?php echo $_SESSION['rev_vivienda'] ?>">
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-danger"><i class="fas fa-eraser"></i>&nbsp;Limpiar</button>
                    <button type="button" class="btn btn-primary" name="envio" id="envio"><i class="fas fa-paper-plane"></i>&nbsp;Enviar</button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
            </form>

            <br></br>

        </div>


        <div class="col-lg-6">

        <div class="form-check form-check-inline sttatus">
            <input type="radio" class="form-check-input" name="datosPago" id="datosPago" value="tf" onclick="datos(this.value)">
            <label class="form-check-label" for="datosPago">Transferencia</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="datosPago" id="datosPago2" value="pm" onclick="datos(this.value)">
            <label class="form-check-label" for="datosPago2">Pago Movil</label>
        </div>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4" style="display: none;" id="tf">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Transferencia</h6>
                </div>
                <div class="card-body">
                    <b>Banesco</b><br>
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796" value="Conjunto Residencial Los Altos II" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796"  value="01341234567890123456" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796" value="J-1234567890" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4" style="display: none;" id="pm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Datos para Pago Móvil</h6>
                </div>
                <div class="card-body">
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796" value="Banesco 0134" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796"  value="04141234567" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                    <div class="copy-link" style="--height: 36px; display: flex;">
                        <input type="text" class="copy-link-input" style="width: 17em; flex-grow: 0; padding: 0; font-size: 1rem; border: 0; border-right: none; outline: none; color: #858796" value="J-1234567890" readonly>
                        <button type="button" class="copy-link-button" style="flex-shrink: 0; width: var(--height); height: var(--height); display: flex; align-items: center; justify-content: center; background: #1eca3b; color: #fff; outline: none; border: 0; border-radius: 10px; cursor: pointer;">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/copy.js"></script>
<script src="../js/solicitud_user.js"></script>
<script src="../js/cuota.js"></script>
<!-- Fin del contenido principal -->


<?php require_once '../vistas/parte_inferior.php'; ?>