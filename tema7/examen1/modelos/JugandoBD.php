<?php
class JugandoBD{

    //metodo que añade un enlace del regalo con los datos dados
    public static function insertarPrimerJugador($idPatida, $idJugador){
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("INSERT INTO jugando (idPartida, idJugador) VALUES (?, ?)");
            // Bind
            $stmt->bindValue(1, $idPatida);
            $stmt->bindValue(2, $idJugador);

            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //metodo que seleciona todos los enlaces de la base de datos y devuelve un un array de arrays de enlaces
    public static function mostrarInfo($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT jugadores.nombre,jugadores.apodo jugadores.nivel FROM jugando JOIN jugadores JOIN partidas WHERE jugando.idPartida=partidas.id AND  jugando.idJugador=jugadores.id AND jugando.idPartida=?");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $jugando = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ConexionBD::cerrar();

        return $jugando;
    }

    
}
?>