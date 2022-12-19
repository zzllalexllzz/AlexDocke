<?php
class ControladorJugando {

    
    public static function mostrarInfo($id) {

        $partida = PartidasBD::getpartidastodos($id);
        $jugando = JugandoBD::mostrarInfo($id);

        VistaJugandoMostrar::render($partida, $jugando);
    }

   

}
?>