<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OxeRev - Registro</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/b95a79e02e.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
    <link rel="icon" href="img\logo_rojo_PhotoRoom.png">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/color_menu.css" rel="stylesheet" type="text/css">

    <style>
        ::selection{
            color: #fff;
            background: #2AA70B;
        }
        span {
            display: block;
            font-size: .8em;
            margin: 0px 0 10px;
            padding: 5px 0 5px 11px;
            width: 200px
        }

        .confirmacion {
            background: #C6FFD5;
            border: 1px solid green;
        }

        .negacion {
            background: #ffcccc;
            border: 1px solid red
        }
    </style>
</head>
<body class="color_menu">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <img class="col-lg-5 d-none d-lg-block" src="img/q422.jpg" alt="Abstractae Q4/22" style="height: 47.3em">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear una cuenta!</h1>
                            </div>
                                <hr>
                            <form class="user" method="POST" id="datoHtml">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                            placeholder="Nombre y Apellido" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="vivienda" name="vivienda"
                                            placeholder="11-33 (EDIF-APTO)" pattern="[0-9]{2}[ -][0-9]{2}" title="El formato debe ser con '-', ej, 21-23 (EDIF-APTO)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="dcorreo" name="dcorreo"
                                            placeholder="Correo Electrónico" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="usuariorev" name="usuariorev"
                                            placeholder="Usuario" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="pass1" name="pass1" placeholder="Contraseña" min="8" max="60" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 8 caracteres." required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="pass2" name="pass2" placeholder="Repita su Contraseña" min="8" max="60" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos 8 caracteres." required>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="custom-control custom-checkbox small">
                                        <label class="text-center text-success font-weight-bold m-0" for="term_check">Acepto los Términos y Condiciones</label>
                                    </div>
                                </div>
                                <div id="status" class="col-sm-12"></div>
                                <input type="button" name="enviar" id="enviar" class="btn btn-success btn-user btn-block" value="Registrar">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-success" href="olvido.php" data-saferedirecturl="olvido.php">¿Olvido de contraseña?</a>
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


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/registro.js"></script>

    <script>
        $(document).ready(function() {
        //variables
        var pass1 = $('[name=pass1]');
        var pass2 = $('[name=pass2]');
        var confirmacion = "Las contraseñas si coinciden";
        var longitud = "La contraseña debe estar formada entre 4-50 carácteres (ambos inclusive)";
        var negacion = "No coinciden las contraseñas";
        var vacio = "La contraseña no puede estar vacía";
        //oculto por defecto el elemento span
        var span = $("<span class='text-center'></span>").insertAfter(pass2);
        span.hide();
        //función que comprueba las dos contraseñas
        function coincidePassword() {
            var valor1 = pass1.val();
            var valor2 = pass2.val();
            //muestro el span
            span.show().removeClass();
            //condiciones dentro de la función
            if (valor1 != valor2) {
                span.text(negacion).addClass('negacion');
            }
            if (valor1.length == 0 || valor1 == "") {
                span.text(vacio).addClass('negacion');
            }
            if (valor1.length < 4 || valor1.length > 50) {
                span.text(longitud).addClass('negacion');
            }
            if (valor1.length != 0 && valor1 == valor2) {
                span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
            }
        }
        //ejecuto la función al soltar la tecla
        pass2.keyup(function() {
            coincidePassword();
        });
    });
    </script>

</body>

</html>