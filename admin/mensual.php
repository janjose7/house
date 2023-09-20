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

unset($_SESSION['a4']);
unset($_SESSION['a4_ncap']);
unset($_SESSION['edif_nc']);
unset($_SESSION['recibo']);
?>

<!-- Inicio del contenido principal -->

<div class="container">
    <h1>Cuotas Mensuales</h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Cargo de Cuota Nueva</h6>
                </div>
                <div class="card-body">
                    <p>En este apartado podrás realizar la carga de los gastos comúnes por inmueble, como también, cargos no comúnes a un edificio en particular.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <!-- FORMULARIO DE AJUSTE DE CONTACTO -->
            <form class="row g-3" method="POST" id="datoHtml">
                <!-- COMIENZO DE NO COMUN -->
                <div class="col-md-12" id="check_nc">
                    <div class="form-check form-switch">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" class="form-check-input" name="flexSwitch" id="flexSwitch"">
                        <label class="form-check-label" for="flexSwitch"><strong>Agregar Gastos No Comúnes</strong></label>
                    </div>
                </div>
                <div class="col-md-12" id="hr_nc0" style="display: none;">
                    <label for="t_nc" class="form-label">Seleccione el Edificio/Casa/Quinta para <strong>Gastos No Comúnes</strong></label>
                    <select class="form-select form-control" name="t_nc" id="t_nc">
                        <option value="ALLT" selected>Seleccione</option>
                        <option value="AFR">Todo el Conjunto</option>
                        <option value="01">Edificio 01</option>
                        <option value="02">Edificio 02</option>
                        <option value="03">Edificio 03</option>
                        <option value="04">Edificio 04</option>
                        <option value="05">Edificio 05</option>
                        <option value="06">Edificio 06</option>
                        <option value="07">Edificio 07</option>
                        <option value="08">Edificio 08</option>
                        <option value="09">Edificio 09</option>
                        <option value="10">Edificio 10</option>
                        <option value="11">Edificio 11</option>
                        <option value="12">Edificio 12</option>
                        <option value="13">Edificio 13</option>
                        <option value="14">Edificio 14</option>
                        <option value="15">Edificio 15</option>
                        <option value="16">Edificio 16</option>
                        <option value="17">Edificio 17</option>
                        <option value="18">Edificio 18</option>
                        <option value="19">Edificio 19</option>
                        <option value="20">Edificio 20</option>
                        <option value="21">Edificio 21</option>
                        <option value="22">Edificio 22</option>
                        <option value="23">Edificio 23</option>
                        <option value="24">Edificio 24</option>
                        <option value="25">Edificio 25</option>
                        <option value="26">Edificio 26</option>
                        <option value="27">Edificio 27</option>
                        <option value="28">Edificio 28</option>
                        <option value="29">Edificio 29</option>
                        <option value="30">Edificio 30</option>
                        <option value="31">Edificio 31</option>
                        <option value="32">Edificio 32</option>
                        <option value="33">Edificio 33</option>
                        <option value="34">Edificio 34</option>
                        <option value="35">Edificio 35</option>
                        <option value="36">Edificio 36</option>
                        <option value="37">Edificio 37</option>
                    </select>
                </div>
                <div class="col-md-6" id="hr_nc1" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt0_nc" id="tt0_nc" placeholder="** No Común #1 **">
                    <input type="number" class="form-control border-left-danger" name="t0_nc" id="t0_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc2" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt1_nc" id="tt1_nc" placeholder="** No Común #2 **">
                    <input type="number" class="form-control border-left-danger" name="t1_nc" id="t1_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc3" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt2_nc" id="tt2_nc" placeholder="** No Común #3 **">
                    <input type="number" class="form-control border-left-danger" name="t2_nc" id="t2_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc4" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt3_nc" id="tt3_nc" placeholder="** No Común #4 **">
                    <input type="number" class="form-control border-left-danger" name="t3_nc" id="t3_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc5" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt4_nc" id="tt4_nc" placeholder="** No Común #5 **">
                    <input type="number" class="form-control border-left-danger" name="t4_nc" id="t4_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc6" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt5_nc" id="tt5_nc" placeholder="** No Común #6 **">
                    <input type="number" class="form-control border-left-danger" name="t5_nc" id="t5_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc7" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt6_nc" id="tt6_nc" placeholder="** No Común #7 **">
                    <input type="number" class="form-control border-left-danger" name="t6_nc" id="t6_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc8" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt7_nc" id="tt7_nc" placeholder="** No Común #8 **">
                    <input type="number" class="form-control border-left-danger" name="t7_nc" id="t7_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc9" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt8_nc" id="tt8_nc" placeholder="** No Común #9 **">
                    <input type="number" class="form-control border-left-danger" name="t8_nc" id="t8_nc" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="hr_nc10" style="display: none;">
                    <input type="text" class="form-control border-left-danger" name="tt9_nc" id="tt9_nc" placeholder="** No Común #10 **">
                    <input type="number" class="form-control border-left-danger" name="t9_nc" id="t9_nc" placeholder="123.45" step="any">
                </div><br></br>
                <!-- FIN DE NO COMUN -->
                <!-- COMIENZO DE COMUN -->
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt0" id="tt0" placeholder="Concepto #1">
                    <input type="number" class="form-control border-left-success" name="t0" id="t0" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt1" id="tt1" placeholder="Concepto #2">
                    <input type="number" class="form-control border-left-success" name="t1" id="t1" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt2" id="tt2" placeholder="Concepto #3">
                    <input type="number" class="form-control border-left-success" name="t2" id="t2" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt3" id="tt3" placeholder="Concepto #4">
                    <input type="number" class="form-control border-left-success" name="t3" id="t3" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt4" id="tt4" placeholder="Concepto #5">
                    <input type="number" class="form-control border-left-success" name="t4" id="t4" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control border-left-success" name="tt5" id="tt5" placeholder="Concepto #6">
                    <input type="number" class="form-control border-left-success" name="t5" id="t5" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add" id="customCheck" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="addd" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt6" id="tt6" placeholder="Concepto #7">
                    <input type="number" class="form-control border-left-success" name="t6" id="t6" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="adddd" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt7" id="tt7" placeholder="Concepto #8">
                    <input type="number" class="form-control border-left-success" name="t7" id="t7" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-0" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add0" id="customCheck0" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck0">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add00" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt8" id="tt8" placeholder="Concepto #9">
                    <input type="number" class="form-control border-left-success" name="t8" id="t8" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add000" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt9" id="tt9" placeholder="Concepto #10">
                    <input type="number" class="form-control border-left-success" name="t9" id="t9" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-1" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add1" id="customCheck1" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck1">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add11" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt10" id="tt10" placeholder="Concepto #11">
                    <input type="number" class="form-control border-left-success" name="t10" id="t10" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add111" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt11" id="tt11" placeholder="Concepto #12">
                    <input type="number" class="form-control border-left-success" name="t11" id="t11" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-2" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add2" id="customCheck2" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck2">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add22" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt12" id="tt12" placeholder="Concepto #13">
                    <input type="number" class="form-control border-left-success" name="t12" id="t12" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add222" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt13" id="tt13" placeholder="Concepto #14">
                    <input type="number" class="form-control border-left-success" name="t13" id="t13" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-3" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add3" id="customCheck3" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck3">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add33" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt14" id="tt14" placeholder="Concepto #15">
                    <input type="number" class="form-control border-left-success" name="t14" id="t14" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add333" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt15" id="tt15" placeholder="Concepto #16">
                    <input type="number" class="form-control border-left-success" name="t15" id="t15" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-4" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add4" id="customCheck4" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck4">Añadir dos (2) campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add44" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt16" id="tt16" placeholder="Concepto #17">
                    <input type="number" class="form-control border-left-success" name="t16" id="t16" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add444" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt17" id="tt17" placeholder="Concepto #18">
                    <input type="number" class="form-control border-left-success" name="t17" id="t17" placeholder="123.45" step="any">
                </div>
                <!-- AGREGAR DOS 2 -->
                <div class="col-md-12" id="add-5" style="display: none;">
                    <div class="custom-control custom-radio small">
                        <input type="radio" class="custom-control-input" name="add5" id="customCheck5" onclick="mostrar(this.name)">
                        <label class="custom-control-label" for="customCheck5">Añadir dos (2) últimos campos más</label>
                    </div>
                </div>
                <div class="col-md-6" id="add55" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt18" id="tt18" placeholder="Concepto #19">
                    <input type="number" class="form-control border-left-success" name="t18" id="t18" placeholder="123.45" step="any">
                </div>
                <div class="col-md-6" id="add555" style="display: none;">
                    <input type="text" class="form-control border-left-success" name="tt19" id="tt19" placeholder="Concepto #20">
                    <input type="number" class="form-control border-left-success" name="t19" id="t19" placeholder="123.45" step="any">
                </div>
                <!-- FIN DE NO COMUN -->
                <div class="col-md-6">
                    <label class="border-bottom-warning" for="RSV" name="tt_rsv" id="tt_rsv">&nbsp;Egreso Fondo de Reserva</label>
                    <input type="number" class="form-control border-left-warning" name="RSV" id="RSV" placeholder="1234567.11" step="any">
                </div>
                <div class="col-md-6">
                    <label class="border-bottom-warning" for="PST" name="tt_pst" id="tt_pst">&nbsp;Egreso Fondo de Prestaciones</label>
                    <input type="number" class="form-control border-left-warning" name="PST" id="PST" placeholder="1234567.11" step="any">
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

            <br></br>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/mensual.js"></script>
<script src="../js/agregar_dos.js"></script>

<?php require_once '../vistas-admin/parte_inferior.php'; ?>