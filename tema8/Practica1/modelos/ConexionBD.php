<?php
use MongoDB\Client;
require 'vendor/autoload.php';
/*
    class ConexionBD {

        private static $conexion;

        public static function conectar($bd="Navidad", $usuario="root", $password="toor", $host="mariadb") {

            try {
                //LOCALHOST
                $dsn = "mysql:host={$host};port=3306;dbname={$bd}";
                self::$conexion = new PDO($dsn, $usuario, $password);


                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e){
                echo $e->getMessage();
                echo self::$conexion->errorInfo();
            }

            return self::$conexion;

        }

        public static function cerrar() {
            self::$conexion = null;
        }


    }
*/
class ConexionBD {

    private static $conexion;


    public static function conectar($bd="RegalosNavidad", $usuario="root", $password="toor", $host="mysql") {

        try {
            //CONEXIÓN A MONGODB CLOUD ATLAS. Comentar esta línea para conectar en local.
            //$host = "mongodb+srv://admin:evhT1Hu8ZasF8llx@cluster0.qmwhh.mongodb.net/".$database."?retryWrites=true&w=majority";
            $host = "mongodb://root:toor@mongo:27017/"; //MongoDB en Docker
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