<?php
use MongoDB\Client;
require 'vendor/autoload.php';

class ConexionBD {

    private static $conexion;


    public static function conectar($bd="ChatGPT", $usuario="root", $password="toor", $host="mysql") {

        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            $host = "mongodb+srv://usuario:usuario-159@cluster0.vqzky9s.mongodb.net/ChatGPT";
            //$host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
            self::$conexion = (new Client($host))->{$bd};
        } catch (Exception $e){
            echo $e->getMessage();
        }
        return self::$conexion;

    }

    public static function cerrar() {
        self::$conexion = null;
    }


}












?>