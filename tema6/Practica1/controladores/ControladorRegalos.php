<?php

    class ControladorRegalos {

        //metodo que muetras los regalos del usuario logueado
        public static function mostrarRegalos($id) {

            $regalos = RegalosBD::getRegalos($id);

            VistaRegalosMostrar::render($regalos);
        }

        //metodo que envia los datos a regalosbd  para modificar el regalo
        public static function modificarRegalo($regalo){

            RegalosBD::modificarRegalo($regalo);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }

        //metodo que envia el id para eliminar un regalo
        public static function eliminarRegalo($deleRegalo){

            RegalosBD::eliminarRegalo($deleRegalo);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }

        //metodo que envia los datos da regalosbd parar crear nuevo regalo
        public static function nuevoRegalo($regalo){

            RegalosBD::nuevoRegalo($regalo);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }

        //metodo que envia el año para buscar el regalo
        public static function buscarRegaloAnio($busAnio){

            $regalos = RegalosBD::buscarRegaloAnio($busAnio);

            VistaRegalosMostrar::render2($regalos);
        }

    }

?>