<?php

    class ControladorArticulo {

        //metodo que muetras el formulario del usuario logueado
        public static function mostrarFormulario() {

            VistaArticuloForm::render();
        }

        //metodo que muetras el articulo generado del usuario logueado
        public static function generarArticulo($texto) {

            VistaArticuloGenerado::render($texto);
        }

        //metodo que guarda el articulo generado del usuario logueado
        public static function guardarArticulo($articulo) {

            $articuloOBJ = new Articulos(0,$articulo["titulo"], $articulo["texto"], $articulo["imagen"], $articulo["fecha"]);
            ArticulosBD::insertarArticulo($articuloOBJ);
            echo "<script>window.location='enrutador.php?accion=mostrarForm';</script>";

        }

    }

?>