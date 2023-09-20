$(document).ready(function() {
    $("#cr").click(function(e) {
        e.preventDefault();
        var Nom = $.trim($('#Nom').val());
        var Cor = $.trim($('#Cor').val());
        var Cla = $.trim($("#Cla").val());
        var Usu = $.trim($('#Usu').val());
        if (Nom == '' || Cor == '' || Cla == '' || Usu == '')
            $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/insertar_admin.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Por favor, espere mientras creamos el usuario&nbsp;<i class='fa-solid fa-user-gear'></i>...</div>");
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