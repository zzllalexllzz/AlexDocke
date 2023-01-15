<?php

class RegalosBD {

    //seleciona todos los regalos de la BD.
    public static function getRegalos($id) {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->regalos;

        $cursor = $coleccion->find(["idUsuario"=>$id]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $regalos = array();
        foreach($cursor as $regalo) {
            $regalo_OBJ = new Regalos($regalo['id'],$regalo['idUsuario'],$regalo['nombre'],$regalo['destinatario'],$regalo['precio'],$regalo['estado'],$regalo['anio']);
            array_push($regalos, $regalo_OBJ);
        }

        ConexionBD::cerrar();

        return $regalos;
    }

    //actualiza  o modifica  los datos de un regalo  en la BD.
    public static function modificarRegalo($regalo) {
        $conexion = ConexionBD::conectar();

        $updateResult = $conexion->regalos->updateOne(
            ["id"=>intVal($regalo["id"])],['$set'=>["nombre"=>$regalo["nombre"],"destinatario"=>$regalo["destinatario"],"precio"=>$regalo["precio"],"estado"=>$regalo["estado"],"anio"=>$regalo["anio"]]]);

        ConexionBD::cerrar();
    }

    //metodo que elimina un regalo del usuario
    public static function eliminarRegalo($deleRegalo){
        $conexion = ConexionBD::conectar();

        $deleteResult = $conexion->regalos->deleteOne(['id' => intVal($deleRegalo["id"])]);

        ConexionBD::cerrar();
    }

    //metodo que añade un regalo del usuario con los datos dados
    public static function nuevoRegalo($regalo){
        $conexion = ConexionBD::conectar();
        //Hacer el autoincrement
        //Ordeno por id, y me quedo con el mayor
        $regaloMayor = $conexion->regalos->findOne(
            [],
            [
                'sort' => ['id' => -1],
            ]);
        if (isset($regaloMayor)){
            $idValue = $regaloMayor['id'];
        }else{
            $idValue = 0;
        }
        $insertOneResult = $conexion->regalos->insertOne([
            "id"=> intVal($idValue)+1,
            "idUsuario"=> $regalo->getIdUsuario(),
            "nombre"=> $regalo->getNombre(),
            "destinatario"=> $regalo->getDestinatario(),
            "precio"=> $regalo->getPrecio(),
            "estado"=> $regalo->getEstado(),
            "anio"=> $regalo->getAnio()
        ]);

        ConexionBD::cerrar();
    }

    //seleciona todos los regalos de la BD.
    public static function buscarRegaloAnio($busAnio) {

        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->regalos;

        $cursor = $coleccion->find(["idUsuario"=>$busAnio["id"],"anio"=>$busAnio["anio"]]);

        //Crear los objetos para devolverlos (MVC), Mongo me devuelve array asociativo
        $regalos = array();
        foreach($cursor as $regalo) {
        $regalo_OBJ = new Regalos($regalo['id'],$regalo['idUsuario'],$regalo['nombre'],$regalo['destinatario'],$regalo['precio'],$regalo['estado'],$regalo['anio']);
        array_push($regalos, $regalo_OBJ);
        }

        ConexionBD::cerrar();

        return $regalos;
    }
}
?>