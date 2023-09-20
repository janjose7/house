$(document).ready(function() {
    $("#envio").click(function(e) {
        e.preventDefault();
        var referencia = $.trim($('#numero_referencia').val());
        var metodo = $.trim($("#metodo").val());
        var comentario = $.trim($("#comentario").val());
        if (referencia == '' || metodo == '' || comentario == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/cuota.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Enviando datos...</div>");
                },
                success: function(response) {
                    $("#status").html(response);
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                timeout: 20000
                });
            }
        });
    });