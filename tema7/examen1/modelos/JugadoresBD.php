<?php 
class JugadoresBD {

    //metodo que seleciona todos los jugadore de la base de datos y devuelve un un array de arrays de jugadores
    public static function chequearLogin($login, &$jugador) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM jugadores WHERE email=? AND password=?");

        $stmt->bindValue(1, $login["email"]);
        $stmt->bindValue(2, $login["password"]);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $stmt->setfetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jugadores');
        $jugador = $stmt->fetch();

        $filas = $stmt->rowCount();

        //Si no me devuelve ninguna fila el password es incorrecto
        if ($filas == 0) {
            return 0;
        } else {
            //Usuario existe y password correcto
            ConexionBD::cerrar();
            return 1;
        }
    }
}
?>