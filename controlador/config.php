<?php

date_default_timezone_set('America/Caracas');

class Conexion
{

    public static function Conectar()
    {
        define('SERVIDOR', 'localhost'); //**SERVER localhost**/
        define('NOMBRE', 'jm_miembros_oxerev'); //**NAME id20312303_jm_miembros_oxerev || id21202899_jm_miembros_oxerev **/
        define('USUARIO', 'root'); //**USER id20312303_oxerev || id21202899_oxerev_ddbb **/
        define('CLAVE', ''); //**PASSWORD  JJ1050245**jj15161264 /

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_EMULATE_PREPARES => false);

        try {
            $conexion = new PDO("mysql:host=" . SERVIDOR . "; dbname=" . NOMBRE, USUARIO, CLAVE, $opciones);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (Exception $e_fatal) {
            die("Ha ocurrido un error en conexion: " . $e_fatal->getMessage() . " || Error {[C01]}");
        }
    }
}

?>

