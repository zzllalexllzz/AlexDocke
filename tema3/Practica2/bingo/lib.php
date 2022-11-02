<?php

    //FUNCIONES
    function pintarTambor() {
        foreach($_SESSION['tambor'] as $num) {
            echo $num." &nbsp;&nbsp;";  
        }
    }

    function pintarCarton($carton) {
        foreach($carton as $num) {
            echo $num." &nbsp;&nbsp;&nbsp;";
        }
    }



    function generarCarton() {
        $carton = array();
        for($i=0; $i<15; $i++) {
            $numero = rand(1,99);
            
            while (in_array($numero, $carton )) {
                $numero = rand(1,99);
            }

            array_push($carton, $numero);
        }

        return $carton;
    }
    //FIN FUNCIONES -------------------------------------

?>