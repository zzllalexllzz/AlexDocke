<?php
class EnlacesBD{

    //metodo que seleciona todos los enlaces de la base de datos y devuelve un un array de arrays de enlaces
    public static function getEnlaces($id) {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->enlaces;

        $cursor = $coleccion->find(["idRegalo"=>$id]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $enlaces = array();
        foreach($cursor as $enlace) {
            $enlace_OBJ = new Enlaces($enlace['id'],$enlace['idRegalo'],$enlace['nombre'],$enlace['web'],$enlace['precio'],$enlace['imagen'],$enlace['prioridad']);
            array_push($enlaces, $enlace_OBJ);
        }

        ConexionBD::cerrar();

        return $enlaces;
    }

    //metodo que elimina un enlace del regalo de la BD
    public static function eliminarEnlace($delEnlace){
        $conexion = ConexionBD::conectar();

        $deleteResult = $conexion->enlaces->deleteOne(['id' => intVal($delEnlace["id"])]);

        ConexionBD::cerrar();
    }

    //metodo que añade un enlace del regalo con los datos dados
    public static function nuevoEnlace($enlace){
        $conexion = ConexionBD::conectar();
        //Hacer el autoincrement
        //Ordeno por id, y me quedo con el mayor
        $enlaceMayor = $conexion->enlaces->findOne(
            [],
            [
                'sort' => ['id' => -1],
            ]);
        if (isset($enlaceMayor)){
            $idValue = $enlaceMayor['id'];
        }else{
            $idValue = 0;
        }
        $insertOneResult = $conexion->enlaces->insertOne([
            "id"=> intVal($idValue)+1,
            "idRegalo"=> $enlace->getIdRegalo(),
            "nombre"=> $enlace->getNombre(),
            "web"=> $enlace->getWeb(),
            "precio"=> intVal($enlace->getPrecio()),
            "imagen"=> $enlace->getImagen(),
            "prioridad"=> $enlace->getPrioridad()
        ]);

        ConexionBD::cerrar();
    }

    //metodo que ordena los enlaces  acendentemente
    public static function mostrarEnlacesOrdA($id) {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->enlaces;

        $cursor = $coleccion->find(["idRegalo"=>$id],["sort"=>["precio"=>1]]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $enlaces = array();
        foreach($cursor as $enlace) {
            $enlace_OBJ = new Enlaces($enlace['id'],$enlace['idRegalo'],$enlace['nombre'],$enlace['web'],$enlace['precio'],$enlace['imagen'],$enlace['prioridad']);
            array_push($enlaces, $enlace_OBJ);
        }

        ConexionBD::cerrar();

        return $enlaces;
    }

    //metodo que ordena los enlaces  decendentemente
    public static function mostrarEnlacesOrdD($id) {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->enlaces;

        $cursor = $coleccion->find(["idRegalo"=>$id],["sort"=>["precio"=>-1]]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $enlaces = array();
        foreach($cursor as $enlace) {
            $enlace_OBJ = new Enlaces($enlace['id'],$enlace['idRegalo'],$enlace['nombre'],$enlace['web'],$enlace['precio'],$enlace['imagen'],$enlace['prioridad']);
            array_push($enlaces, $enlace_OBJ);
        }

        ConexionBD::cerrar();

        return $enlaces;
    }
}
?>