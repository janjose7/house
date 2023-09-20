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
require_once '../controlador/config.php';

$instancia = new Conexion();
$conn = $instancia->Conectar();

$consulta = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev ORDER BY vivienda_scs0_rev ASC");
$consulta->execute();
$mostrar = $consulta->fetchAll(PDO::FETCH_OBJ);

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Sincronizar Propietarios y Viviendas</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <div class="col-md-6">
                    <label for="" class="form-label">Vivienda</label>
                    <input type="text" class="form-control" name="vivienda" id="vivienda" placeholder="Apto-Edif" pattern="[0-9]{2}[ -][0-9]{2}" title="El formato debe ser con '-', ej, 21-23 (EDIF-APTO)" >
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Propietario</label>
                    <input type="text" class="form-control" name="propietario" id="propietario" placeholder="Nombre del Propietario">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Monto</label>
                    <select  class="form-select form-control" name="operador" id="operador">
                        <option>Seleccione</option>
                        <option value="Abono">Abono</option>
                        <option value="Deuda">Deuda</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="monto" id="monto" placeholder="123.45" step="any">
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
                        </span>Agregar
                    </button>
                </div>
                <div id="status" style="padding: 0.7em 0 0 0"></div>
            </form>
            <div id="status"></div><br>
        </div>

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Conjunto Residencial Los Altos II <i class="fas fa-building"></i></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                            <tr>
                                    <th>Vivienda</th>
                                    <th>Deuda</th>
                                    <th>Abonado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach($mostrar as $show):
                                    if($show->correo_scs0_rev == ''): ?>
                                <tr>
                                    <td><?php echo $show->vivienda_scs0_rev ?></td>
                                    <td><?php echo $show->deuda_oxe ?></td>
                                    <td><?php echo $show->abono_oxe ?></td>
                                </tr>
                                <?php
                                    endif;
                                    endforeach;
                                ?>
                            </tbody>
                            <!-- <div id="miTabla"></div> -->
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/tiempo_real.js"></script>
<script src="../js/tabla_sync.js"></script>


<?php require_once '../vistas-admin/parte_inferior.php'; ?>