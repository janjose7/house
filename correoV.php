<?php

function validar_email($email) { 
    $disponibles = array('gmail.com', 'hotmail.com', 'yahoo.com');
    $valid_email = False; // Se asume inicialmente que no cumple
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== False) {
        $at_pos = strpos($email, '@');
        $email_domain = substr($email, $at_pos+1);
        if(in_array($email_domain, $disponibles)) {
            $valid_email = True; // Si se encuentra en $disponibles
        } 
    }
    return $valid_email;
}




prueba
var_dump(validar_email('usuario@gmail.com')); // True
var_dump(validar_email('usuario@php.net')); // False
var_dump(validar_email('usuario_yahoo.com')); // False
var_dump(validar_email('usuario200@yahoo.com.eu')); // False
var_dump(validar_email('usuario200@yahoo.com')); // True

?>