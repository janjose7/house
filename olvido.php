<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Olvido de Clave</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" href="img\logo_rojo_PhotoRoom.png">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/color_menu.css" rel="stylesheet" type="text/css">
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
                            <img class="col-lg-6 d-none d-lg-block" alt="Abstractae Q2/21"src="img/q221.jpg">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Introduza el correo electrónico para restablecer su contraseña de acceso.
                                        </p>
                                    </div>
                                    <form class="user" method="POST" id="datoHtml">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Introduzca su correo electrónico...">
                                        </div>
                                        <div id="status"></div>
                                        <input type="button" name="recuperar" id="recuperar" class="btn btn-success btn-user btn-block" value="Recuperar">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-success" href="registro.php" data-saferedirecturl="registro.php">¡Crear una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="login.php" data-saferedirecturl="login.php">¿Tienes una cuenta? ¡Entra!</a>
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
    <script src="js/olvido.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>