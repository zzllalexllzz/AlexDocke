<?php
    class ControladorCampeones {

        public static function mostrarCampeones() {
            VistaCampeones::mostrarCampeonesAPI();

        }
        public static function mostrarDetalle($id) {
            VistaCampeones::mostrarDetalleCampeones($id);

        }



    }


?>