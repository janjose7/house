$(document).ready(function() {
    $("#envio").click(function(e) {
        e.preventDefault();
        var nombre = $.trim($('#nombre').val());
        var correo = $.trim($('#correo').val());
        var tlf = $.trim($("#tlf").val());
        var sms = $.trim($('#sms').val());
        if (nombre == '' || correo == '' || tlf == '' || sms == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "controlador/contacto_index.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Enviando mensaje...&nbsp;<i class='fa-solid fa-rotate'></i></div>");
                },
                success: function(response) {
                    $("#status").html("<div class='alert alert-success' role='alert'>Enviado con exito</div>");
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