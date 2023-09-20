$(document).ready(function() {
    $("#btnReservar").click(function(e) {
        e.preventDefault();
        var id = $.trim($("#id").val());
        var stt = $.trim($("#stt").val());
        var vivienda = $.trim($("#vivienda").val());
        var membrete = $.trim($("#membrete").val());
        var nombre = $.trim($("#nombre").val());
        var cedula = $.trim($("#cedula").val());
        var antiguedad = $.trim($("#antiguedad").val());
        var correo = $.trim($("#correo").val());
        if (id == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/solicitud_aprobado.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor espere... <i class='fas fa-cloud'></div>");
                },
                success: function(response) {
                    $("#status").html(response);
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function () {$("#alertaCerrar").alert("close");}, 3000));

                },
                timeout: 20000
                });
            }
        });

    $("#btnReenvio").click(function(e) {
        e.preventDefault();
        var id = $.trim($("#id").val());
        var stt = $.trim($("#stt").val());
        var sms_motivo = $.trim($("#sms_motivo").val());
        var correo_user = $.trim($("#correo_user").val());
        if (id == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/solicitud_rechazo.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor espere... <i class='fas fa-cloud'></div>");
                },
                success: function(response) {
                    $("#status").html(response);
                },
                error: function(jqXHR, estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));
                },
                complete: function(jqXHR,estado){

                },
                timeout: 20000
                });
            }
        });
    });