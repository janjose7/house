$(document).ready(function() {
    $("#enviar").click(function(e) {
        e.preventDefault();
        var form_ifc = $.trim($('#form_ifc').val());
        var t0 = $.trim($('#t0').val());
        var t1 = $.trim($('#t1').val());
        var t2 = $.trim($('#t2').val());
        var t3 = $.trim($('#t3').val());
        var t4 = $.trim($('#t4').val());

        if (form_ifc == '' || t1 == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/multa.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere mientras cargamos la multa... <i class='fas fa-cloud'></div>");
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