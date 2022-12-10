<?php

class RegalosBD {

    //seleciona todos los prestamos de la BD.
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
}
?>