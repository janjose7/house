<?php

session_start();

date_default_timezone_set('America/Caracas');

if(isset($_SESSION['correoSV'])){
    $_SESSION['viviendaSV'];
    $_SESSION['nombreSV'];
    $_SESSION['correoSV'];
} else {
    header("Location: registro.php");
}

$correo = $_SESSION['correoSV'];

require_once "controlador/config.php";

$instancia = new Conexion();
$conn = $instancia->Conectar();

$buscar = $conn->prepare("SELECT * FROM usuarios_scs0_oxerev WHERE correo_scs0_rev = '$correo'");
$buscar->execute();
$home = $buscar->fetch(PDO::FETCH_OBJ);
$email = $home->correo_scs0_rev;
$vivienda = $home->vivienda_scs0_rev;

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OxeRev - Validación</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img class="col-lg-5 d-none d-lg-block" src="img/q331.jpg" alt="Abstractae Q3/31" style="height: 35em">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Confirmación de la Vivienda <?php echo $vivienda ?>!</h1>
                            </div>
                            <hr>
                            <br>
                            <label>Se le ha enviado el codigo de verificacón al correo electrónico <strong><?php echo $email ?></strong>.</label>
                            <p>&nbsp;&nbsp;&nbsp;Tiene <strong>5 minutos</strong> antes que el codigo de verificación expire.</p>
                            <form class="user" method="POST" id="datoHtml">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo"
                                            placeholder="Código ######" required>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="button" name="vrf" id="vrf" class="btn btn-success btn-user btn-block" value="Verificar">
                                    </div>
                                </div>
                                <div id="status" class="col-sm-12"></div>
                                <input type="button" value="Solicitar un nuevo codigo" name="sol" id="sol"  class="btn btn-danger btn-user btn-block text-center">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    

    <script src="js/registro_correo.js"></script>
    <script src="js/noBack.js"></script>
    <script src="js/evitar_reenvio.js"></script>
    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>