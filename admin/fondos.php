<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 1)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}


require_once '../vistas-admin/parte_superior.php';

?>

<!-- Inicio del contenido principal -->

<div class="container">
    <h1>Resumen de Fondos</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-6">
                    <label for="fondo_rsv" class="form-label">Fondo</label>
                    <select  class="form-select form-control" name="fondo_rsv" id="fondo_rsv">
                        <option>Seleccione</option>
                        <option value="Reserva">Reserva</option>
                        <option value="Prestaciones">Prestaciones</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="operador" class="form-label">Operación</label>
                    <select  class="form-select form-control" name="operador" id="operador">
                        <option>Seleccione</option>
                        <option value="Credito">Crédito</option>
                        <option value="Debito">Débito</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="monto_fondo" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="monto_fondo" id="monto_fondo" placeholder="123.45" step="any">
                </div>
                <div class="col-12 text-center">
                    <button type="reset" class="btn btn-danger col-3" name="reset" id="reset" >
                        <span class="icon text-white-50">
                        <i class="fas fa-eraser"></i>
                        </span>Borrar
                    </button>
                    <button type="button" class="btn btn-success col-3" name="enviar" id="enviar" >
                        <span class="icon text-white-50">
                        <i class="fas fa-receipt"></i>
                        </span>Cargar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
            </form>
            <div id="status"></div><br>


            <br></br>
        </div>

        <div class="col-lg-6">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Tabla de Fondos <i class="fas fa-vault"></i></h6>
                </div>
                <div class="card-body">
                    <div id="miTabla"></div>
                </div>
            </div>

        </div>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/tiempo_real_fondos.js"></script>
<script src="../js/tabla_sync_fondos.js"></script>



<?php require_once '../vistas-admin/parte_inferior.php'; ?>