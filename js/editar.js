$(document).ready(function() {
    $("#actualizar").click(function(e) {
        e.preventDefault();
        var id = $.trim($('#id').val());
        var nombre = $.trim($('#nombre').val());
        var usuario = $.trim($("#usuario").val());
        var correo = $.trim($("#correo").val());
        var clave = $.trim($("#clave").val());
        var vivienda = $.trim($("#vivienda").val());
        var person = $.trim($("#person").val());
        if (nombre == '' || usuario == '' || correo == '' || vivienda == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos del usuario no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/editar.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Actualizando...</div>");
                },
                success: function(response) {
                    $("#status").html(response);
                    $("#datoHtml").trigger("reset");
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                timeout: 20000
                });
            }
        });

    $("#borrar").click(function(e) {
        e.preventDefault();
        var id = $.trim($('#id').val());
        var usuario = $.trim($("#usuario").val());
        var correo = $.trim($("#correo").val());
        if (id == '' || usuario == '' || correo == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Ha ocurrido un error al seleccionar el usuario...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/editar_borrar.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor espere...</div>");
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