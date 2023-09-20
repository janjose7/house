<?php

session_start();

date_default_timezone_set('America/Caracas');

if(isset($_SESSION['correoSV'])){
    $_SESSION['correoSV'];
} else {
    header("Location: solicitud.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OxeRev - Confirmar</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                        <img class="col-lg-6 d-none d-lg-block" src="img/q122.jpg" alt="Abstractae Q1/22" style="height: 42.5em">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Validación de Código</h1>
                                        <label>&nbsp;&nbsp;&nbsp;Se le ha enviado el codigo de verificacón al correo electrónico <strong><?php echo $_SESSION['correoSV'] ?></strong>. Tiene <strong>5 minutos</strong> antes que el codigo expire</label>
                                        <p>&nbsp;&nbsp;&nbsp;<i>Sí por alguna razón usted abandona el proceso, sus datos seran borrados en un lapso de <strong>24 horas</strong> para evitar futuros inconvenientes</i> </p>
                                    </div>
                                    <form class="user" method="POST" id="datoHtml">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="codigo" name="codigo"
                                                placeholder="Código ######" required>
                                        </div>
                                        <div id="status"></div>
                                        <input type="button" name="validar" id="validar" class="btn btn-success btn-user btn-block" value="Validar">
                                        <div id="status" class="col-sm-12"></div><br>
                                        <input type="button" value="Solicitar un nuevo codigo" name="sol" id="sol"  class="btn btn-danger btn-user btn-block text-center">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-success" href="olvido.php">¿Olvido la Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="registro.php">¡Crear una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="login.php">¿Tienes una cuenta? ¡Entra!</a>
                                    </div>
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
    <script src="js/solicitud_confirmar.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>