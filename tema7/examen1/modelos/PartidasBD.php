<?php

class PartidasBD {

    //seleciona todos los partidas de la BD.
    public static function getPartidas() {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE fecha>='2022-12-19' ORDER BY fecha DESC");

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partida = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partidas');

        ConexionBD::cerrar();

        return $partida;
    }


    //metodo que añade un regalo del usuario con los datos dados
    public static function nuevaPartida($partida){
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("INSERT INTO partidas (fecha, hora, ciudad, lugar, cubierto, estado) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind
            $stmt->bindValue(1, $partida["fecha"]);
            $stmt->bindValue(2, $partida["hora"]);
            $stmt->bindValue(3, $partida["ciudad"]);
            $stmt->bindValue(4, $partida["lugar"]);
            $stmt->bindValue(5, $partida["cubierto"]);
            $stmt->bindValue(6, $partida["estado"]);

            // Ejecuta la consulta
            $stmt->execute();
            $id = $conexion->lastinsertid();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
        return $id;
    }

    //seleciona todos los partidas de la BD.
    public static function buscarFecha($partida) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE fecha = ?");

        $stmt->bindValue(1, $partida["fecha"]);

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partida = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partidas');

        ConexionBD::cerrar();

        return $partida;
    }
    //seleciona todos los partidas de la BD.
    public static function buscarCiudad($partida) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE ciudad = ?");

        $stmt->bindValue(1, $partida["ciudad"]);

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partida = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partidas');

        ConexionBD::cerrar();

        return $partida;
    }

    
    public static function getpartidastodos($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM partidas WHERE id=?");

        $stmt->bindValue(1, $id["id"]);

        $stmt->execute();
        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $partida = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partidas');

        ConexionBD::cerrar();

        return $partida;
    }







}
?>