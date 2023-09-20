<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OxeRev</title>
    <link rel="icon" href="../img/logo_rojo_PhotoRoom.png">
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" type="text/css" href="../css/navraw.css">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/color_menu.css">
    <link rel="stylesheet" type="text/css" href="../css/encuesta.css">
    <link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/copy.css">
    <script src='https://cdn.plot.ly/plotly-2.20.0.min.js'></script>
    <style>
        ::selection{
            color: #fff;
            background: #2AA70B;
        }
    </style>
</head>

<body id="page-top" onload="ini()" onkeypress="parar()">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <ul class="navbar-nav color_menu sidebar sidebar-dark accordion" id="accordionSidebar"> <!-- bg-gradient-success -->

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <img src="../img/logo_b.png" style="width:50px; height: 50px">
                </div>
                <div class="sidebar-brand-text mx-3">oxer<sup> <?php echo $_SESSION['rev_vivienda']; ?></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-mail-bulk fa-sm fa-fw"></i>
                    <span>Abono</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipos de Abonos</h6>
                        <a class="collapse-item" href="cuota.php">Cuota</a>
                        <a class="collapse-item" href="extraordinario.php">Especial</a>
                        <h6 class="collapse-header">Solicitudes</h6>
                        <a class="collapse-item" href="solicitud.php">Solicitud</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-file-alt"></i>
                    <span>Comprobantes</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="pex.php">Pago Extraordinario</a>
                        <a class="collapse-item" href="mes.php">Pago de Mes</a>
                        <a class="collapse-item" href="pda.php">Pago Alquiler</a>
                        <a class="collapse-item" href="pcr.php">Pago Carta/R</a>
                        <a class="collapse-item" href="mudanza.php">Mudanza</a>
                        <a class="collapse-item" href="solvencia.php">Solvencia</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesTwo"
                    aria-expanded="true" aria-controls="collapsePagesTwo">
                    <i class="fa-solid fa-money-check"></i>
                    <span>Procesados</span>
                </a>
                <div id="collapsePagesTwo" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="recibo.php">Recibo de Mes</a>
                        <a class="collapse-item" href="pdm.php">Abonos</a>
                        <a class="collapse-item" href="alquiler.php">Alquiler</a>
                        <a class="collapse-item" href="carta.php">Carta de Residencia</a>
                        <a class="collapse-item" href="ticket.php">Ticket</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-cogs fa-sm fa-fw"></i>
                    <span>Ajustes</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ajustes.php">Ajustes</a>
                        <a class="collapse-item" href="contacto.php">Ayuda</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="adquirir.php">
                    <i class="fa-fw fa-sm fa-solid fa-rocket"></i>
                    <span>¡Adquirir!</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../img/undraw_rocket.svg" alt="...">
                <h6 class="text-center mb-2">Prueba Gratis</h6>
                <p class="text-center mb-2 text-white" id="demo"></p>
                <p class="text-center mb-2"><strong>OxeRev</strong> es un software con caracteristicas premium</p>
                <a class="btn btn-success btn-sm" href="adquirir.php">¡Adquirir!</a>
            </div>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $_SESSION['rev_conectado']; ?></span>&nbsp;&nbsp;
                                <i class="fa-solid fa-door-open"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../user/ajustes.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                                <a class="dropdown-item" href="../user/contacto.php">
                                    <i class="fas fa-life-ring fa-fw fa-sm mr-2 text-gray-400"></i>
                                    Ayuda
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../controlador/salir.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

