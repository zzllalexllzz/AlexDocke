<?php 
class ArticulosBD {
    //seleciona todos los articlos de la BD.
    public static function mostrarArticulos() {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->articulos;

        $cursor = $coleccion->find([],["sort"=>["fecha"=>-1]]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $articulos = array();
        foreach($cursor as $articulo) {
            $articulo_OBJ = new Articulos($articulo['id'],$articulo['titulo'],$articulo['texto'],$articulo['imagen'],$articulo['fecha']);
            array_push($articulos, $articulo_OBJ);
        }

        ConexionBD::cerrar();

        return $articulos;
    }
}
?>