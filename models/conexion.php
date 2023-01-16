<?php
class Conexion{
    public static function conectar(){

        #PDO("nombre-servidor; nombre-basededatos", "usuario", "contraseña")
        $link = new PDO("mysql:host=localhost;dbname=curso-php", "root", "");
        
        $link-> exec("set names utf8");
        #para caracteres latinos

        return $link;
    }
}

?>