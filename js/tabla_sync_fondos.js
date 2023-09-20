$(document).ready(function() {
    $("#enviar").click(function(e) {
    e.preventDefault();
    var monto_fondo = $.trim($('#monto_fondo').val());
    var operador = $.trim($('#operador').val());
    var fondo_rsv = $.trim($('#fondo_rsv').val());
    if (monto_fondo == '' || operador == '' || fondo_rsv == '')
    $("#status").html("<div class='alert alert-warning' role='alert'>Los campos no pueden estar vacios...</div>");
    else {
        $.ajax({
            type: "POST",
            url: "../controlador/sync_fondos.php",
            data: $("#datoHtml").serialize(),
            beforeSend: function() {
                $("#status").html("<div class='alert alert-warning' role='alert'>Cargando...</div>");
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