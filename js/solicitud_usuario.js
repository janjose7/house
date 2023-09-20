$(document).ready(function() {
    $("#enviar").click(function(e) {
        e.preventDefault();
        var form_solicitud = $.trim($('#form_solicitud').val());
        var aq1 = $.trim($("#aq1").val());
        var aq2 = $.trim($('#aq2').val());
        var sv1 = $.trim($('#sv1').val());
        var rs1 = $.trim($("#rs1").val());
        var rs2 = $.trim($('#rs2').val());
        var rs3 = $.trim($("#rs3").val());
        var rs4 = $.trim($("#rs4").val());
        var mz1 = $.trim($('#mz1').val());
        var mz2 = $.trim($('#mz2').val());

            $.ajax({
                type: "POST",
                url: "../controlador/ssu.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere... <i class='fas fa-cloud'></div>");
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
    });