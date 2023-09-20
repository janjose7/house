var pepe;

function ini() {
    pepe = setTimeout('location="../controlador/salir.php"', 50000); // 5 minutos
}

function parar() {
    clearTimeout(pepe);
    pepe = setTimeout('location="../controlador/salir.php"', 50000); // 5 minutos
}