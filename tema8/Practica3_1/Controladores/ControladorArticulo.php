<?php

    class ControladorArticulo {

        //metodo que muetras todos los articulos
        public static function mostrarArticulos() {

            $articulos = ArticulosBD::mostrarArticulos();
            VistaArticuloMostrar::render($articulos);
        }

    }

?>