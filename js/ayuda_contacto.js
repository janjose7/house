$(document).ready(function(){
    $("#ayuda").click(function(e){
        e.preventDefault();
        var asunto_contacto = $.trim($('#asunto_contacto').val());
        var comentario_contacto = $.trim($('#comentario_contacto').val());
        if(comentario_contacto == '')
            $("#status").html("<div class='alert alert-warning' role='alert'>No se puede enviar un correo vacio...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/ayuda.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Preparando mensaje...</div>");
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

    $("#ayuda_dev").click(function(e){
        e.preventDefault();
        var dev_contacto = $.trim($('#dev_contacto').val());
        var dev_comentario = $.trim($('#dev_comentario').val());
        if(dev_comentario == '')
            $("#status0").html("<div class='alert alert-warning' role='alert'>No se puede enviar un correo vacio...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/ayuda_dev.php",
                data: $("#datoHtml0").serialize(),
                beforeSend: function() {
                    $("#status0").html("<div class='alert alert-warning' role='alert'>Preparando mensaje...</div>");
                },
                success: function(response) {
                    $("#status0").html(response);
                    $("#datoHtml0").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS
                },
                error: function(jqXHR, estado, error) {
                    $("#status0").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));

                },
                complete: function(jqXHR,estado){

                },
                timeout: 20000
            });
        }
    });


    $("#enviar").click(function(e){
        e.preventDefault();
        var asunto_admin = $.trim($('#asunto_admin').val());
        var sms_admin = $.trim($('#sms_admin').val());
        if(sms_admin == '')
            $("#status").html("<div class='alert alert-warning' role='alert'>No se puede enviar un correo vacio...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "../controlador/ayuda_admin.php",
                data: $("#datoHtml").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-warning' role='alert'>Preparando mensaje...</div>");
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