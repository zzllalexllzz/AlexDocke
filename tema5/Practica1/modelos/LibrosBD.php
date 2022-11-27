<?php 
class LibrosBD{

    //metodo que seleciona todos los libros de la base de datos y devuelve un un array de arrays de libros
    public static function getLibros() {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM  libros");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $libros = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Libros');

        ConexionBD::cerrar();

        return $libros;
    }
}
?>