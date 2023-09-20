<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/color_menu.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img\logo_rojo_PhotoRoom.png">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        ::selection{
            color: #fff;
            background: #2AA70B;
        }
    </style>
</head>

<body class="color_menu">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img class="col-lg-6 d-none d-lg-block" src="img/ini_lo.jpg" alt="Abstractae Q2/22" style="height: 40em">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="h4 text-gray-900 mb-4">¡Bienvenido!</h4>
                                    </div>
                                    <hr>
                                    <form id="formLogin" class="user" method="POST">
                                        <div class="form-group">
                                            <label class="form-label" for="userev"><b>Correo ó Usuario:</b></label>
                                            <input type="text" class="form-control form-control-user" name="userev" id="userev" aria-describedby="emailHelp" placeholder="oxerev@ejemplo.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="passrev"><b>Contraseña:</b></label>
                                            <input type="password" class="form-control form-control-user" name="passrev" id="passrev" placeholder="**********">
                                        </div>
                                        <div id="status"></div>
                                        <input type="button" name="inicio_login" id="inicio_login" value="Iniciar Sesión" class="btn btn-success btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-success" href="olvido.php" data-saferedirecturl="olvido.php">¿Olvido la Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="registro.php" data-saferedirecturl="registro.php">¡Crear una Cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="solicitud.php" data-saferedirecturl="solicitud.php">Solicitar nuevo codigo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>



</body>

</html>