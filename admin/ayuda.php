<?php

session_start();
if(!isset($_SESSION['rev_conectado']))
{
    header("Location: ../controlador/out.php");
} elseif($_SESSION['rev_rol'] == 1)
{
    header("index.php");
} else {
    header("Location: ../controlador/out.php");
}

require_once '../vistas-admin/parte_superior.php';

?>

<!-- Inicio del contenido principal -->
<div class="container">
    <h1>Ayuda y Contacto</h1>
</div>
<!-- Collapsable Card Example -->
<div class="container">
    <div class="row">
        <!-- Caja de Contacto -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header text-success m-0 font-weight-bold ">
                    Contacto&nbsp;&nbsp;<i class="fas fa-comment-dots"></i>
                </div>
                <div class="card-body">
                    <p><a href="#" style="text-decoration: none; color: rgba(0,163,224,1)"><i class="fab fa-whatsapp" style="color: #00bb2d; font-size:25px;"></i>&nbsp; <strong>Enviar Mensaje</strong></a></p>
                    <p><a href="#" style="text-decoration: none; color: rgba(0,163,224,1)"><i class="fab fa-telegram-plane" style="color: #0088cc; font-size:25px"></i>&nbsp; <strong>Enviar Mensaje</strong></a></p>
                    <p><a href="#" style="text-decoration: none; color: rgba(0,163,224,1)"><i class="fab fa-instagram" style="color: #E1306C; font-size:25px"></i>&nbsp; <strong>OxeRev</strong></a></p>
                    <p><a href="mailto:contacto.oxe@gmail.com?Subject=Hola,%20requiero%20de%20tu%20ayuda" style="text-decoration: none; color: rgba(0,163,224,1)"><i class="fa-solid fa-envelope-open-text" style="color: #00A3E0; font-size:25px"></i>&nbsp; <strong>contacto.oxe@gmail.com</strong></a></p>
                </div>
            </div>
        </div>

        <!-- Caja de Envio de Correo  -->
        <div class="col-lg-6">
        <form method="POST" id="datoHtml">
            <div class="mb-3">
                <label for="asunto_admin" class="form-label m-0 font-weight-bold ">Asunto</label>
                <input type="text" class="form-control" id="asunto_admin" name="asunto_admin" placeholder="Asunto">
            </div>
            <div class="mb-3">
                <label for="sms_admin" class="form-label m-0 font-weight-bold">Comentario</label>
                <textarea class="form-control" id="sms_admin" name="sms_admin" rows="3" placeholder="Será un place atender sus necesidades o inquietudes"></textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success me-md-2" id="enviar" type="button">Enviar&nbsp;<i class="fa-solid fa-paper-plane"></i></button>
            </div>
            <div id="status" style="padding: 0.7em 0 0 0"></div>
        </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../js/ayuda_contacto.js"></script>
<!-- Fin del contenido principal -->

<?php require_once '../vistas-admin/parte_inferior.php'; ?>