<?php 
class ArticulosBD {
    //metodo que añade un articulo del usuario con los datos dados
    public static function insertarArticulo($articulo){
        $conexion = ConexionBD::conectar();
        //Hacer el autoincrement
        //Ordeno por id, y me quedo con el mayor
        $articuloMayor = $conexion->articulos->findOne(
            [],
            [
                'sort' => ['id' => -1],
            ]);
        if (isset($articuloMayor)){
            $idValue = $articuloMayor['id'];
        }else{
            $idValue = 0;
        }
        $insertOneResult = $conexion->articulos->insertOne([
            "id"=> intVal($idValue)+1,
            "titulo"=> $articulo->getTitulo(),
            "texto"=> $articulo->getTexto(),
            "imagen"=> $articulo->getImagen(),
            "fecha"=> $articulo->getFecha()
        ]);

        ConexionBD::cerrar();
    }
}
?>