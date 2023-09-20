<?php

session_start();

date_default_timezone_set('America/Caracas');

if(isset($_SESSION['correoSV'])){
    $_SESSION['correoSV'];
} else {
    header("Location: olvido.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OxeRev - Recuperación</title>
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
                            <img class="col-lg-6 d-none d-lg-block" alt="Abstractae Q2/21"src="img/q221.jpg">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Confirmación de Código</h1>
                                        <label class="mb-4">Código enviado a <strong><?php echo $_SESSION['correoSV'] ?></strong>. Tiene <strong>5 minutos</strong> antes que el código expire</label>
                                    </div>
                                    <form class="user" method="POST" id="datoHtml">
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo"
                                            placeholder="Código ######" required>
                                        </div>
                                        <div id="status"></div>
                                        <input type="button" name="recuperar" id="recuperar" class="btn btn-success btn-user btn-block" value="Recuperar">
                                        <input type="button" value="Solicitar un nuevo codigo" name="sol" id="sol"  class="btn btn-danger btn-user btn-block text-center">
                                    </form>
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
    <script src="js/olvido_correo.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>