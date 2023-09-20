$(document).ready(function() {
    $("#enviar").click(function(e) {
        e.preventDefault();
        //****** Cifras ******/
        var t0 = $.trim($('#t0').val());
        var t1 = $.trim($("#t1").val());
        var t2 = $.trim($('#t2').val());
        var t3 = $.trim($("#t3").val());
        var t4 = $.trim($('#t4').val());
        var t5 = $.trim($("#t5").val());
        var t6 = $.trim($('#t6').val());
        var t7 = $.trim($("#t7").val());
        var t8 = $.trim($('#t8').val());
        var t9 = $.trim($("#t9").val());
        var t10 = $.trim($('#t10').val());
        var t11 = $.trim($("#t11").val());
        var t12 = $.trim($('#t12').val());
        var t13 = $.trim($("#t13").val());
        var t14 = $.trim($('#t14').val());
        var t15 = $.trim($("#t15").val());
        var t16 = $.trim($('#t16').val());
        var t17 = $.trim($("#t17").val());
        var t18 = $.trim($('#t18').val());
        var t19 = $.trim($("#t19").val());

        //******** Texto *******/
        var tt0 = $.trim($('#tt0').val());
        var tt1 = $.trim($("#tt1").val());
        var tt2 = $.trim($('#tt2').val());
        var tt3 = $.trim($("#tt3").val());
        var tt4 = $.trim($('#tt4').val());
        var tt5 = $.trim($("#tt5").val());
        var tt6 = $.trim($('#tt6').val());
        var tt7 = $.trim($("#tt7").val());
        var tt8 = $.trim($('#tt8').val());
        var tt9 = $.trim($("#tt9").val());
        var tt10 = $.trim($('#tt10').val());
        var tt11 = $.trim($("#tt11").val());
        var tt12 = $.trim($('#tt12').val());
        var tt13 = $.trim($("#tt13").val());
        var tt14 = $.trim($('#tt14').val());
        var tt15 = $.trim($("#tt15").val());
        var tt16 = $.trim($('#tt16').val());
        var tt17 = $.trim($("#tt17").val());
        var tt18 = $.trim($('#tt18').val());
        var tt19 = $.trim($("#tt19").val());

        //********* Egresos ********/
        var RSV =$.trim($("#RSV").val());
        var PST =$.trim($("#PST").val());

        if (t0 == '' )
        $("#status").html("<div class='alert alert-warning' role='alert'>No se pueden cargar campos incompletos...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/cargar.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere mientras cargamos la cuota... <i class='fas fa-cloud'></div>");
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