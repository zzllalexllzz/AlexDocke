<?php
class EnlacesBD{

    //metodo que seleciona todos los enlaces de la base de datos y devuelve un un array de arrays de enlaces
    public static function getEnlaces($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM  enlaces WHERE idRegalo = ?");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlaces');

        ConexionBD::cerrar();

        return $enlaces;
    }

    //metodo que seleciona todos los los enlaces
    public static function todosEnlaces() {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM  enlaces");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlaces');

        ConexionBD::cerrar();

        return $enlaces;
    }

    //metodo que elimina un enlace del regalo de la BD
    public static function eliminarEnlace($delEnlace){
        $conexion = ConexionBD::conectar();

        try {
            $stmt = $conexion->prepare("DELETE FROM enlaces WHERE id = ?");

            $stmt->bindValue(1, $delEnlace["id"]);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ConexionBD::cerrar();//Cerrar la conexión
    }

    //metodo que añade un enlace del regalo con los datos dados
    public static function nuevoEnlace($enlace){
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("INSERT INTO enlaces (idRegalo, nombre, web, precio, imagen, prioridad) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind
            $stmt->bindValue(1, $enlace["idRegalo"]);
            $stmt->bindValue(2, $enlace["nombre"]);
            $stmt->bindValue(3, $enlace["web"]);
            $stmt->bindValue(4, $enlace["precio"]);
            $stmt->bindValue(5, $enlace["imagen"]);
            $stmt->bindValue(6, $enlace["prioridad"]);

            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //metodo que ordena los enlaces  acendentemente
    public static function mostrarEnlacesOrdA($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM  enlaces WHERE idRegalo = ? ORDER BY precio ASC");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlaces');

        ConexionBD::cerrar();

        return $enlaces;
    }

    //metodo que ordena los enlaces  decendentemente
    public static function mostrarEnlacesOrdD($id) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM  enlaces WHERE idRegalo = ? ORDER BY precio DESC");

        $stmt->bindValue(1, $id);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $enlaces = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Enlaces');

        ConexionBD::cerrar();

        return $enlaces;
    }
}
?>