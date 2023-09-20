$(document).ready(function() {
    $("#adquirir").click(function(e) {
        e.preventDefault();
        var sms_comentario = $.trim($("#sms_comentario").val());
        if(sms_comentario == '')
            $("#status0").html("<div class='alert alert-warning' role='alert'>No se puede enviar un correo vacio...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/adquirir_admin.php",
                data: $("#datoHtml0").serialize(),
                beforeSend: function() {
                    $("#status0").html("<div class='alert alert-warning' role='alert'>Enviando... <i class='fas fa-sync-alt'></i></div>");
                },
                success: function(response) {
                    $("#status0").html(response);
                    $("#datoHtml0").trigger("reset");
                },
                error: function(estado, error) {
                    $("#status0").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                timeout: 20000
                });
            }
        });

    $("#voto").click(function(e) {
        e.preventDefault();
        var valor = $.trim($('#valor').val());
        var comentario = $.trim($("#comentario").val());
        $.ajax({
            type: "POST",
            url: "../controlador/adquirir.php",
            data: $("#datoHtml1").serialize(),
            beforeSend: function() {
                $("#status1").html("<div class='alert alert-warning' role='alert'>Enviando Calificación... <i class='fas fa-sync-alt'></i></div>");
            },
            success: function(response) {
                $("#status1").html(response);
                $("#datoHtml1").trigger("reset");
            },
            error: function(jqXHR, estado, error) {
                $("#status1").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

            },
            complete: function(jqXHR,estado){

            },
            timeout: 20000
            });
        });

        $("#adquirir").click(function(e) {
            e.preventDefault();
            var sms_comentario = $.trim($("#sms_comentario").val());
            $.ajax({
                type: "POST",
                url: "../controlador/adquirir_admin.php",
                data: $("#datoHtml2").serialize(),
                beforeSend: function() {
                    $("#status2").html("<div class='alert alert-warning' role='alert'>Enviando... <i class='fas fa-sync-alt'></i></div>");
                },
                success: function(response) {
                    $("#status2").html(response);
                    $("#datoHtml2").trigger("reset");
                },
                error: function(jqXHR, estado, error) {
                    $("#status2").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                complete: function(jqXHR,estado){

                },
                timeout: 20000
                });
            });

        $("#voto").click(function(e) {
            e.preventDefault();
            var valor = $.trim($('#valor').val());
            var comentario = $.trim($("#comentario").val());
            $.ajax({
                type: "POST",
                url: "../controlador/adquirir.php",
                data: $("#datoHtml3").serialize(),
                beforeSend: function() {
                    $("#status3").html("<div class='alert alert-warning' role='alert'>Enviando Calificación... <i class='fas fa-sync-alt'></i></div>");
                },
                success: function(response) {
                    $("#status3").html(response);
                    $("#datoHtml3").trigger("reset");
                },
                error: function(jqXHR, estado, error) {
                    $("#status3").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                complete: function(jqXHR,estado){

                },
                timeout: 20000
                });
            });
    });