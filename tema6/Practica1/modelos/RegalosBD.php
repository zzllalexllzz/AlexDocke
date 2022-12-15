<?php

class RegalosBD {

    //seleciona todos los regalos de la BD.
    public static function getRegalos($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM regalos WHERE idUsuario = ?");

        $stmt->bindValue(1, $id);

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalos');

        ConexionBD::cerrar();

        return $regalos;
    }

    //actualiza  o modifica  los datos de un regalo  en la BD.
    public static function modificarRegalo($regalo) {
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("UPDATE regalos SET nombre = ?, destinatario = ?, precio = ?, estado = ?, anio = ? WHERE id = ?");
            // Bind
            $stmt->bindValue(1, $regalo["nombre"]);
            $stmt->bindValue(2, $regalo["destinatario"]);
            $stmt->bindValue(3, $regalo["precio"]);
            $stmt->bindValue(4, $regalo["estado"]);
            $stmt->bindValue(5, $regalo["anio"]);
            $stmt->bindValue(6, $regalo["id"]);

            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //metodo que elimina un regalo del usuario
    public static function eliminarRegalo($deleRegalo){
        $conexion = ConexionBD::conectar();

        try {
            $stmt = $conexion->prepare("DELETE FROM regalos WHERE id = ?");

            $stmt->bindValue(1, $deleRegalo["id"]);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ConexionBD::cerrar();//Cerrar la conexión
    }

    //metodo que añade un regalo del usuario con los datos dados
    public static function nuevoRegalo($regalo){
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("INSERT INTO regalos (idUsuario, nombre, destinatario, precio, estado, anio) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind
            $stmt->bindValue(1, $regalo["idUsuario"]);
            $stmt->bindValue(2, $regalo["nombre"]);
            $stmt->bindValue(3, $regalo["destinatario"]);
            $stmt->bindValue(4, $regalo["precio"]);
            $stmt->bindValue(5, $regalo["estado"]);
            $stmt->bindValue(6, $regalo["anio"]);

            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //seleciona todos los regalos de la BD.
    public static function buscarRegaloAnio($busAnio) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM regalos WHERE idUsuario = ? AND anio = ?");

        $stmt->bindValue(1, $busAnio["id"]);
        $stmt->bindValue(2, $busAnio["anio"]);

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalos');

        ConexionBD::cerrar();

        return $regalos;
    }
}
?>