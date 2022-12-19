<?php

    class ControladorPartidas {

        //metodo que muetras los regalos del usuario logueado
        public static function mostrarPartidas() {

            $partidas = PartidasBD::getPartidas();

            VistaPartidasMostrar::render($partidas);
        }

        //metodo que envia los datos da regalosbd parar crear nuevo regalo
        public static function nuevaPartida($partida){
            $idPartida=PartidasBD::nuevaPartida($partida);
            JugandoBD::insertarPrimerJugador($idPartida, $partida["jugador"]);
            echo "<script>window.location='enrutador.php?accion=mostrarPartidas';</script>";
        }

        public static function buscarFecha($partida){
            $buscado=PartidasBD::buscarFecha($partida);
            VistaPartidasMostrar::render($buscado);
        }
        public static function buscarCiudad($partida){
            $buscado=PartidasBD::buscarCiudad($partida);
            VistaPartidasMostrar::render($buscado);
        }



    }

?>