<?php

    class ConexionBD {

        private static $conexion;

        public static function conectar($bd="Padelea", $usuario="root", $password="toor", $host="mariadb") {

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













?>