$(document).ready(function() {
    $("#enviar").click(function(e) {
        e.preventDefault();
        var nombre = $.trim($('#nombre').val());
        var vivienda = $.trim($("#vivienda").val());
        var dcorreo = $.trim($('#dcorreo').val());
        var usuariorev = $.trim($('#usuariorev').val());
        var term_check = $.trim($('#term_check').val());
        var pass1 = $.trim($('#pass1').val());
        var pass2 = $.trim($('#pass2').val());
        if ( nombre == '' || vivienda == '' || dcorreo == '' || usuariorev == '' || pass1 == '' || pass2 == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "controlador/registro.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-info' role='alert'>Por favor espere...</div>");
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