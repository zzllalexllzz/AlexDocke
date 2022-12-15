<?php
class ControladorEnlaces {

    //metodo que muetras los enlaces del regalos seleccionado
    public static function mostrarEnlaces($id) {

        $enlaces = EnlacesBD::getEnlaces($id);

        VistaEnlacesMostrar::render($enlaces);
    }

    //metodo que envia un id enlace para borrar
    public static function eliminarEnlace($delEnlace){

        EnlacesBD::eliminarEnlace($delEnlace);
        echo "<script>window.location='enrutador.php?accion=verEnlaces&id=".$delEnlace["idRegalo"]."';</script>";
    }

    //metodo que recoge los datos del formulario para la creacion de un nuevo enlace
    public static function nuevoEnlace($enlace) {

        EnlacesBD::nuevoEnlace($enlace);
        echo "<script>window.location='enrutador.php?accion=verEnlaces&id=".$enlace["idRegalo"]."';</script>";
    }

    //metodo que recoge los datos para devolverlos ordenados Acendentemente
    public static function mostrarEnlacesOrdA($id) {

        $enlace = EnlacesBD::mostrarEnlacesOrdA($id);

        VistaEnlacesMostrar::render($enlace);
    }

    //metodo que recoge los datos para devolverlos ordenados Decendentemente
    public static function mostrarEnlacesOrdD($id) {

        $enlace = EnlacesBD::mostrarEnlacesOrdD($id);

        VistaEnlacesMostrar::render($enlace);
    }

}
?>