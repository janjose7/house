$(document).ready(function() {
    $("#recuperado").click(function(e) {
        e.preventDefault();
        var clave = $.trim($('#clave').val());
        var rclave = $.trim($('#rclave').val());
        if (clave == '' || rclave == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "controlador/recuperarCorreo.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-info' role='alert'>Procesando contraseña...</div>");
                },
                success: function(response) {
                    $("#status").html(response);
                    $("#datoHtml").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));
                },
                timeout: 20000
                });
            }
        });
    });