$(document).ready(function() {
    $("#inicio_login").click(function(e) {
        e.preventDefault();
        var userev = $.trim($('#userev').val());
        var passrev = $.trim($('#passrev').val());
        if (userev == '' || passrev == '')
        $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
        else {
            $.ajax({
                type: "POST",
                url: "controlador/login.php",
                data: $("#formLogin").serialize(),
                beforeSend: function() {
                    $("#status").html("<div class='alert alert-info' role='alert'>Buscando datos <i class='fa-solid fa-magnifying-glass'></i>...</div>");
                },
                success: function(response) {
                    $("#status").html(response);
                    $("#formLogin").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS
                },
                error: function(estado, error) {
                    $("#status").html("<div id='alertaCerrar' class='alert alert-danger alert-dismissible fade show' role='alert'><strong>¡Lo sentimos!</strong>. Tiempo de respuesta agotado: " + estado + " // " + error + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>" + setTimeout(function(){$("#alertaCerrar").alert("close");}, 3000));
                    $("#formLogin").trigger("reset"); // LIMPIAR LOS CAMPOS USADOS

                },
                timeout: 20000
                });
            }
        });
    });