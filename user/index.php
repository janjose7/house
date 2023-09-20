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

require_once('../controlador/sync_dolar.php');

$oxe = $_SESSION['rev_id'];

$consulta = $conn->prepare("SELECT * FROM tasa_scs13_oxerev WHERE id_scs13_rev = 1");
$consulta->execute();
$bcv = $consulta->fetch(PDO::FETCH_OBJ);
$dvs = $bcv->divisa_scs13_rev;
$usd = $bcv->tasa_actual_scs13_rev;
$var_por = $bcv->var_por_scs13_rev;
$var_bs = $bcv->var_bs_scs13_rev;

$sql = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE id_scs0_rev = $oxe");
$sql->execute();
$show = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h3>Bienvenido/a <?php echo $_SESSION['rev_conectado']; ?></h3>
</div>

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Actual: REF <?php $nuevoActual = ($show['actual_oxe'] / $usd ); echo number_format($nuevoActual, 2, '.', ',') ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($show['actual_oxe'], 2, '.', ',') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Abono: REF <?php $abonoActual = ($show['abono_oxe'] / $usd ); echo number_format($abonoActual, 2, '.', ',') ?>
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($show['abono_oxe'], 2, '.', ',') ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wallet fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Vencida: REF <?php $acumActual = ($show['deuda_oxe'] / $usd ); echo number_format($acumActual, 2, '.', ',') ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($show['deuda_oxe'], 2, '.', ',') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total: REF <?php $totalActual = ($show['total_oxe'] / $usd ); echo number_format($totalActual, 2, '.', ',') ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($show['total_oxe'], 2, '.', ',') ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <!-- Illustrations -->
                    <div class="card text-center shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Valor de Divisa&nbsp;<i class="fas fa-comments-dollar"></i></h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-hover table-borderless ">
                                        <thead class="text-center">
                                            <tr>
                                                <td colspan="2"><strong>USD</strong></td>
                                                <td colspan="2"><strong>EURO</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                            <?php if(substr($varianPor[5], 0, 3) == '▲'){ ?>
                                                <td colspan="2">Bs. <?php echo $valores[5] ?></td>
                                            <?php } elseif(substr($varianPor[5], 0, 3) == '▼'){ ?>
                                                <td colspan="2">Bs. <?php echo $valores[5] ?></td>
                                            <?php } elseif(substr($varianPor[5], 0, 2) == '0'){ ?>
                                                <td colspan="2">Bs. <?php echo $valores[5] ?></td>
                                            <?php } ?>

                                            <?php if(substr($varianPor_eur[5], 0, 3) == '▲'){ ?>
                                                <td colspan="2">Bs. <?php echo $valor[5] ?></td>
                                            <?php } elseif(substr($varianPor_eur[5], 0, 3) == '▼'){ ?>
                                                <td colspan="2">Bs. <?php echo $valor[5] ?></td>
                                            <?php } elseif(substr($varianPor_eur[5], 0, 2) == '0'){ ?>
                                                <td colspan="2">Bs. <?php echo $valor[5] ?></td>
                                            <?php } ?>
                                            </tr>
                                            <tr>
                                            <?php if(substr($varianPor[5], 0, 3) == '▲'){ ?>
                                                <td colspan="2"><i class="fa-solid fa-chevron-up" style="color: #00ff00"></i>&nbsp;<?php echo substr($varianPor[5], 4) ?>&nbsp;&nbsp;Bs. <?php echo $varianBs[5] ?></td>
                                            <?php } elseif(substr($varianPor[5], 0, 3) == '▼'){ ?>
                                                <td colspan="2"><i class="fa-solid fa-chevron-down" style="color:#fa0a0a"></i>&nbsp;<?php echo substr($varianPor[5], 4) ?>&nbsp;&nbsp;Bs. <?php echo $varianBs[5] ?></td>
                                            <?php } elseif(substr($varianPor[5], 0, 2) == '0'){ ?>
                                                <td colspan="2"><i class='fa-solid fa-equals'></i>&nbsp;<?php echo $varianPor[5] ?>&nbsp;&nbsp;Bs. <?php echo $varianBs[5] ?></td>
                                            <?php } ?>

                                            <?php if(substr($varianPor_eur[5], 0, 3) == '▲'){ ?>
                                                <td colspan="2"><i class="fa-solid fa-chevron-up" style="color: #00ff00"></i>&nbsp;<?php echo substr($varianPor_eur[5], 4) ?>&nbsp;&nbsp;Bs. <?php echo $varianBs_eur[5] ?></td>
                                            <?php } elseif(substr($varianPor_eur[5], 0, 3) == '▼'){ ?>
                                                <td colspan="2"><i class="fa-solid fa-chevron-down" style="color:#fa0a0a"></i>&nbsp;<?php echo substr($varianPor_eur[5], 4) ?>&nbsp;&nbsp;Bs. <?php echo $varianBs_eur[5] ?></td>
                                            <?php } elseif(substr($varianPor_eur[5], 0, 2) == '0'){ ?>
                                                <td colspan="2"><i class='fa-solid fa-equals'></i>&nbsp;<?php echo $varianPor_eur[5] ?>&nbsp;&nbsp;Bs. <?php echo $varianBs_eur[5] ?></td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card text-center shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Tu Hora</h6>
                        </div>
                        <div class="rolex-cntOuterWrapper">
                            <div class="rolex-cntInnerWrapper">
                                <div class="rolex-right-side">
                                <div class="rolex-cntClockContainer">

                                    <div class="clock-container clocks single linear">
                                        <article class="clock simple">
                                            <div class="hours-container">
                                                <div class="hours angled"></div>
                                            </div>
                                            <div class="minutes-container">
                                                <div class="minutes angled"></div>
                                            </div>
                                            <div class="seconds-container">
                                                <div class="seconds"></div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-success text-center">Tu Tiempo</h6>
                        </div>
                        <div class="card-body">
                            <div class="rolex-cntOuterWrapper">
                                <div class="rolex-cntInnerWrapper">
                                    <div class="rolex-left-side">
                                        <div class="rolex-cntTitleContainer">
                                            <img class="rolex-cntTitle" alt="Contador de Exploración"
                                                src="../img/conteo.png"/>

                                        </div>
                                        <div class="rolex-cntDownContainer">
                                            <div id="countdown">
                                                <div class="timebox">
                                                    <span class="cnt_days"></span>
                                                </div>
                                                <div class="timebox">
                                                    <span class="divider">:</span>
                                                </div>
                                                <div class="timebox">
                                                    <span class="cnt_hours"></span>
                                                </div>
                                                <div class="timebox">
                                                    <span class="divider">:</span>
                                                </div>
                                                <div class="timebox">
                                                    <span class="cnt_minutes"></span>
                                                </div>

                                            </div>
                                            <div class="rolex-countdown-labels">
                                                <div>DIAS</div>
                                                <div>&#160;&#160;&#160;&#160;HRS</div>
                                                <div>&#160;&#160;&#160;&#160;&#160;MIN</div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="rolex-right-side">
                                    <div class="rolex-cntClockContainer">
                                        <div class="rolex-presented-by">
                                            <span></span>
                                            <img alt="Rolex"
                                                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0ic3ZnMiIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIiB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMTgwcHgiIGhlaWdodD0iMTAycHgiIHZpZXdCb3g9IjAgMCAxODAgMTAyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxODAgMTAyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBpZD0icGF0aDQ3IiBmaWxsPSIjQTM3RTJDIiBkPSJNMTExLjg5OSwxMS45NWMwLjgsMCwxLjU1LDAuMjk5LDIuMjUsMC44OTlsMC44OTksMi4yNWwtMC44OTksMi4yNWwtMi4yNSwxLjA1MWwtMC43NS0wLjE1MWwtOSwzMC43NWMtMC42MDEsMS44LTIuMDAxLDMuMjQ5LTQuMTk4LDQuMzUxYy0yLjMwMywxLjIwMS00LjkzOSwxLjc5OS03LjkzOSwxLjc5OXMtNS42LTAuNTk4LTcuODAxLTEuNzk5Yy0yLjI5OS0xLjEwMi0zLjY5OC0yLjU1MS00LjE5OS00LjM1MUw2OSwxOC4yNDlMNjguMTAxLDE4LjRjLTAuODAyLDAtMS41NTItMC4zNTItMi4yNS0xLjA1MWMtMC42MDEtMC42MDEtMC45MDEtMS4zNTEtMC45MDEtMi4yNWMwLTAuODAxLDAuMzAxLTEuNTUxLDAuOTAxLTIuMjVjMC42OTgtMC42MDEsMS40NDgtMC44OTksMi4yNS0wLjg5OWMwLjg5OSwwLDEuNjk4LDAuMjk5LDIuMzk5LDAuODk5bDAuODk5LDIuMjVsLTAuNDUsMS44bC0xLjM0OSwxLjA1bDEwLjUsMjIuNWwtMS42NTEtMzAuM2wtMi4yNS0wLjkwMWMtMC42OTgtMC41OTktMS4wNS0xLjM0OS0xLjA1LTIuMjVjMC0wLjg5OSwwLjM1Mi0xLjY0OSwxLjA1LTIuMjVjMC42MDItMC41OTksMS4zNTItMC44OTksMi4yNS0wLjg5OWMwLjgwMiwwLDEuNTUyLDAuMywyLjI1LDAuODk5bDAuOTAxLDIuMjVMODEsOC45NWwtMS44MDEsMS4wNDlMODYuMjUsMzkuN2wzLjMwMS0zMi43MDFsLTEuOTUtMS4wNDlsLTAuNzUtMi4xMDFjMC0wLjgwMSwwLjI5OS0xLjU1MSwwLjg5OS0yLjI1Qzg4LjM1MSwwLjk5OSw4OS4xMDEsMC43LDkwLDAuN3MxLjY0OSwwLjI5OSwyLjI1LDAuODk5bDAuODk5LDIuMjVsLTAuNzUsMi4xMDFsLTEuOTUsMS4wNDlsMy40NSwzMi43MDFsNi44OTktMjkuNzAxTDk5LjE0OSw4Ljk1bC0wLjYwMS0xLjk1MWMwLTAuODk5LDAuMzEzLTEuNjQ5LDAuOTAyLTIuMjVjMC41OTgtMC41OTksMS4zNDgtMC44OTksMi4yNS0wLjg5OWMwLjkxMSwwLDEuNjYxLDAuMywyLjI1LDAuODk5bDAuOTExLDIuMjVsLTAuOTExLDIuMjVsLTIuMjUsMC45MDFsLTEuODAyLDMwLjNsMTAuNS0yMi41bC0xLjE5OC0xLjA1bC0wLjYwMS0xLjhjMC0wLjgwMSwwLjI5OS0xLjU1MSwwLjg5OS0yLjI1QzExMC4xOTcsMTIuMjQ5LDExMSwxMS45NSwxMTEuODk5LDExLjk1eiBNOTAsNTIuNzQ5bDcuMDQ5LTAuODk5YzIuMDA0LTAuNjAxLDMtMS4zNTEsMy0yLjI1cy0wLjk5Ni0xLjY0OS0zLTIuMjVMOTAsNDYuNDVsLTcuMDUxLDAuODk5Yy0yLDAuNjAxLTMsMS4zNTEtMywyLjI1czEsMS42NDksMywyLjI1TDkwLDUyLjc0OXoiLz48cGF0aCBpZD0icGF0aDQ5IiBmaWxsPSIjMDA2MDM5IiBkPSJNNTEuNjAxLDcxLjk1aC0wLjE1MWMtMS42OTcsMC43LTMsMS44NDktMy44OTgsMy40NDhjLTEuNiwyLjUwMi0yLjQwMSw1LjUwMi0yLjQwMSw5bDAuNzUsNS4wODlMNDgsOTMuNjg2bDEuODAxLDEuOTM5QzUxLjEsOTYuNzI3LDUyLjUsOTcuMjc3LDU0LDk3LjI3N2wwLjc1LDAuMTU4bDAuODk5LTAuMTU4YzEuNSwwLDIuOTAxLTAuNTUxLDQuMjAxLTEuNjUybDEuNzk5LTEuOTM5bDIuMTAxLTQuMTk4bDAuNzUtNS4wODljMC0zLjQ5OC0wLjg1LTYuNDk4LTIuNTUxLTljLTAuODk4LTEuNi0yLjE1LTIuNzQ4LTMuNzUtMy40MzlsLTEuMDUtMC4zMTFsLTIuMzk5LTAuNDM5bC0yLjI1LDAuNDM5TDUxLjYwMSw3MS45NXogTTU4LjE5OSw3MS45NWgtMC4xNDhINTguMTk5eiBNNDMuMDUxLDk1LjgwMWMtMy4yMDEtMy4xOTktNC44MDEtNy4wNjMtNC44MDEtMTEuNTYzYzAtNC4zOTcsMS42LTguMTg4LDQuODAxLTExLjM5OWMzLjMtMy4xODgsNy4xOTktNC44MTEsMTEuNjk5LTQuODExYzQuNiwwLDguNDk5LDEuNiwxMS42OTksNC44MTFjMy4zMDEsMy4xODgsNC45NSw3LjAwMiw0Ljk1LDExLjM5OWMwLDQuNS0xLjY0OSw4LjM1My00Ljk1LDExLjU2M2MtMy4xOTcsMy4xODgtNy4xLDQuNzk5LTExLjY5OSw0Ljc5OUM1MC4yNSwxMDAuNiw0Ni4zNTEsOTksNDMuMDUxLDk1LjgwMXoiLz48cGF0aCBpZD0icGF0aDUxIiBmaWxsPSIjMDA2MDM5IiBkPSJNMTAxLjg1MSw5Mi4zNVY4Ny43aDIuMjV2NC4zNTF2Ny41SDc1LjQ0OXYtMi4yNWg0LjVWNzEuNDk5aC00LjVWNjkuMUg5MS41djIuMzk5SDg3djI1LjgwMmg5Ljc1YzEuNCwwLDIuNjAyLTAuNTA0LDMuNjAxLTEuNUMxMDEuMzUsOTQuNzk5LDEwMS44NTEsOTMuNjUsMTAxLjg1MSw5Mi4zNXoiLz48cGF0aCBpZD0icGF0aDUzIiBmaWxsPSIjMDA2MDM5IiBkPSJNMTI2Ljc1LDgxLjM5OGMwLjY5Ny0wLjY4NiwxLjA0OS0xLjU0NywxLjA0OS0yLjU0OVY3Ny4yaDIuMTAxdjEyLjc1aC0yLjEwMXYtMS44MDJjMC0wLjk5Ni0wLjM0Ni0xLjg0Ni0xLjA0OS0yLjU0OWMtMC44MDMtMC42OTctMS42OTktMS4wNDktMi43MDEtMS4wNDloLTMuNTk4djEyLjc1aDExLjM5OWMxLjM5NywwLDIuNTk5LTAuNTA0LDMuNjAxLTEuNWMwLjk5Ni0xLjAwMiwxLjUtMi4yMDMsMS41LTMuNjAxVjg4LjZoMi4yNXYxMC45NTFoLTMwLjMwMnYtMi4yNWg0LjM1MVY3MS40OTloLTQuMzUxVjY5LjFoMzAuMzAydjEwLjVoLTIuMjVWNzYuNDVjMC0xLjQwMy0wLjUwNC0yLjU1Mi0xLjUtMy40NTFjLTEuMDAyLTAuOTk5LTIuMjAzLTEuNS0zLjYwMS0xLjVoLTExLjM5OVY4Mi40NWgzLjU5OEwxMjYuNzUsODEuMzk4eiIvPjxwYXRoIGlkPSJwYXRoNTUiIGZpbGw9IiMwMDYwMzkiIGQ9Ik0xNDUuNSw3MS4zNWgtMC42MDF2LTIuMTAxaDE1LjMwMnYyLjEwMUgxNTcuNWwtMC42MDEsMC4yOTlsLTAuMjk5LDAuNzVsMC4xNDksMC43NWw1LjcwMSw2LjkwMmw1Ljg0OC03LjA1MmwwLjE1Mi0wLjYwMWwtMC4zMDItMC43NWwtMC43NS0wLjI5OWgtMi42OTh2LTIuMTAxSDE3N3YyLjEwMWgtMS43OTljLTEuMDAyLDAuMS0xLjgxMywwLjM1Mi0yLjQwMiwwLjc1bC0yLjA5OCwyLjEwMWwtNi43NSw3Ljk0OEwxNzQuMTQ5LDk0LjZsMS45NTEsMi4xMDFsMi4zOTksMC43NWgxLjV2Mi4xMDFoLTE2LjVWOTcuNDVoMi44NTFsMC43NS0wLjMwMmwwLjI5OS0wLjkxMWwtMC4yOTktMC41ODlsLTYuNzUtOC41NjFsLTcuMjAxLDguNTYxbC0wLjI5OSwwLjc1bDAuMjk5LDAuNzVsMC43NSwwLjMwMmgzLjMwMnYyLjEwMUgxNDRWOTcuNDVoMS45NTFsMi4zOTktMC43NWwyLjI1LTIuMTAxbDcuOTQ4LTkuNjAxbC04Ljg0OC0xMS4xMDFMMTQ3Ljc1LDcyLjFDMTQ3LjI1Miw3MS43MDEsMTQ2LjUwMiw3MS40NDksMTQ1LjUsNzEuMzV6Ii8+PHBhdGggaWQ9InBhdGg1NyIgZmlsbD0iIzAwNjAzOSIgZD0iTTIzLjM5OSw2OS4xYzIuMiwwLDQuMDUsMC43NSw1LjU1LDIuMjVjMS41LDEuNiwyLjI1LDMuNDUxLDIuMjUsNS41NDljMCwyLjAwNC0wLjU5OSwzLjc1LTEuOCw1LjI1Yy0xLjI5OCwxLjQtMi45LDIuMjUtNC43OTksMi41NTJsMy4yOTksMS41bDEuOCwyLjEwMWwxLjM1MSwzLjE0OUwzMyw5Ny4zMDFoMy42MDF2Mi4yNUgyNi41NUwyNS4yLDkzLjdsLTEuNS00LjM1MWwtMC41OTktMC44OTlsLTIuMjUtMi4zOTlsLTIuMTAxLTAuNzVsLTIuODUxLTAuNDUxaC00LjV2MTIuNDUxaDQuNXYyLjI1SDB2LTIuMjVoNC4zNTFWNzEuMzVIMFY2OS4xSDIzLjM5OXogTTI0LjYwMSw3Ni44OThjMC0xLjUtMC41NTItMi44MDEtMS42NTEtMy44OTljLTEuMS0wLjk5OS0yLjQ0OC0xLjU1LTQuMDUtMS42NDlIMTEuNTVWODIuNDVoNy4zNDljMS42MDMsMCwyLjk1LTAuNTAxLDQuMDUtMS41QzI0LjA1MSw3OS44NTIsMjQuNjAxLDc4LjQ5OCwyNC42MDEsNzYuODk4eiIvPjwvc3ZnPg==" />
                                        </div>

                                        <div class="clock-container clocks single linear">
                                            <article class="clock simple">
                                                <div class="hours-container">
                                                    <div class="hours angled"></div>
                                                </div>
                                                <div class="minutes-container">
                                                    <div class="minutes angled"></div>
                                                </div>
                                                <div class="seconds-container">
                                                    <div class="seconds"></div>
                                                </div>
                                            </article>
                                        </div>

                                    </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <script src="../js/raw.js"></script>
    <!-- End of Content Wrapper -->
    <!-- Fin del contenido principal -->

    <?php require_once '../vistas/parte_inferior.php'; ?>