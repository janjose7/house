<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OxeRev</title>
    <link rel="icon" href="../img/logo_rojo_PhotoRoom.png">
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" type="text/css" href="../css/navraw.css">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/color_menu.css">
    <link rel="stylesheet" type="text/css" href="../css/encuesta.css">
    <link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css">
    <script src='https://cdn.plot.ly/plotly-2.20.0.min.js'></script>
    <style>
        ::selection{
            color: #fff;
            background: #2AA70B;
        }
    </style>
</head>
<body id="page-top" onload="ini()" onkeypress="parar()"">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav color_menu sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <img src="../img/logo_b.png" style="width:50px; height: 50px">
                </div>
                <div class="sidebar-brand-text mx-3">oxer</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-sm fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-flag fa-fw fa-sm"></i>
                    <span>Cargar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pagos</h6>
                        <a class="collapse-item" href="mensual.php">Mensual</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Infracción</h6>
                        <a class="collapse-item" href="multa.php">Cargar</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-clipboard-check fa-fw fa-sm"></i>
                    <span>Validar</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="procesar.php">Cuotas</a>
                        <h6 class="collapse-header">Extraordinario</h6>
                        <a class="collapse-item" href="extraordinario.php">Pago Especial</a>
                        <a class="collapse-item" href="solicitud.php">Solicitud</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-sm fa-folder"></i>
                    <span>Comprobantes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pagos Verificados</h6>
                        <a class="collapse-item" href="mes.php">Recibos de Mes</a>
                        <a class="collapse-item" href="pago.php">Recibos de Pagos</a>
                        <a class="collapse-item" href="ticket.php">Tickets</a>
                        <a class="collapse-item" href="cs.php">Comprobante de solicitud</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Ajustes</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ajustes.php">Ajustes</a>
                        <a class="collapse-item" href="ajuste.php">Ajustes de Admin</a>
                        <a class="collapse-item" href="fondos.php">Ajustes de Fondos</a>
                        <a class="collapse-item" href="sync.php">Sincronizar Propietarios</a>
                        <a class="collapse-item" href="ayuda.php">Ayuda</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="adquirir.php">
                    <i class="fa-fw fa-sm fa-solid fa-rocket"></i>
                    <span>¡Adquirir!</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../img/undraw_rocket.svg" alt="...">
                <h6 class="text-center mb-2">Prueba Gratis</h6>
                <p class="text-center mb-2 text-white" id="demo"></p>
                <p class="text-center mb-2"><strong>OxeRev</strong> es un software con caracteristicas premium</p>
                <a class="btn btn-success btn-sm" href="adquirir.php">¡Adquirir!</a>
            </div>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['rev_conectado']; ?></span>&nbsp;&nbsp;
                                <i class="fa-solid fa-door-open"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../admin/ajustes_admin.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                                <a class="dropdown-item" href="../admin/ayuda.php">
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

