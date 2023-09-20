$(document).ready(function() {
    $("#btnConfirmar").click(function(e) {
        e.preventDefault();
        var ab = $.trim($('#ab').val());
        var co = $.trim($("#co").val());
        var id = $.trim($("#id").val());
        var usu = $.trim($("#usu").val());
        var viv = $.trim($("#viv").val());
        if (ab == '' || co == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/procesar.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere mientras cargamos el abono... <i class='fas fa-cloud'></div>");
                },
                success: function(response) {
                    $("#status").html(response);
                    $("#datoHtml").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));
                    console.log(estado)
                    console.log(error)
                },
                timeout: 20000
                });
            }
        });


    $("#btnReenvio").click(function(e) {
        e.preventDefault();
        var id = $.trim($("#id").val());
        var nom = $.trim($("#nom").val());
        var ref = $.trim($("#ref").val());
        var sms_motivo = $.trim($("#sms_motivo").val());
        var ema = $.trim($("#ema").val());
        if (id == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/validar_rechazo.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor espere... <i class='fas fa-cloud'></div>");
                },
                success: function(response) {
                    $("#status").html(response);
                    $("#datoHtml").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS
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