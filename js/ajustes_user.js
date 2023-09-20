$(document).ready(function() {
    $("#eliminar").click(function(e) {
        e.preventDefault();
        var nombre = $.trim($('#nombre').val());
        var usuario = $.trim($("#usuario").val());
        var correo = $.trim($("#correo").val());
        var clave = $.trim($("#clave").val());
        $.ajax({
            type: "POST",
            url: "../controlador/ajustes_delete.php",
            data: $("#datoHtml").serialize(),
            beforeSend: function() {
                $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere... <i class='fas fa-sync-alt'></i></div>");
            },
            success: function(response) {
                $("#status").html(response);
            },
            error: function(estado, error) {
                $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

            },
            timeout: 20000
            });
    });


    $("#actualizar").click(function(e) {
        e.preventDefault();
        var nombre = $.trim($('#nombre').val());
        var usuario = $.trim($("#usuario").val());
        var correo = $.trim($("#correo").val());
        var clave = $.trim($("#clave").val());
        if (nombre == '' || usuario == '' || correo == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/ajustes.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere su actualización de datos... <i class='fas fa-sync-alt'></i></div>");
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