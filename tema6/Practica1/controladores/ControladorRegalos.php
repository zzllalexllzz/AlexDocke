<?php

    class ControladorRegalos {

        //metodo que muetras los regalos del usuario logueado
        public static function mostrarRegalos($id) {

            $regalos = RegalosBD::getRegalos($id);

            VistaRegalosMostrar::render($regalos);
        }

        public static function modificarRegalo($regalo){
            RegalosBD::modificarRegalo($regalo);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }

    }

?>