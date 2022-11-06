<?php

    //FUNCIONES
    function pintarTambor() {

        echo "<div class='row'>";
        
        foreach($_SESSION['tambor'] as $num) {
            echo "<div class='col'>";
            echo "<span class='fs-6'>".$num."</span>";
            echo "</div>";
        }
        
        echo "</div>";

    }

    function pintarCarton($carton) {

        echo "<div class='row'>";
        
        foreach($carton as $num) {
            echo "<div class='col'>";
            if (in_array($num, $_SESSION['salidos'])) {
                echo "<span class='fs-6 text-danger'>".$num."</span>";
            } else {
                echo "<span class='fs-6'>".$num."</span>";
            }
            
            echo "</div>";
        }
        
        echo "</div>";

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

    function pintarFormularioJugadores() {
        echo "<form action='controlador.php' method='post'>";

        for($i=0; $i<$_SESSION['numJugadores'];$i++) {
            echo "<div class='mb-3'>
                        <label for='nick".$i."' class='form-label'>Nick</label>
                        <input type='text' class='form-control' name='nick".$i."'>
                        <label for='saldo".$i."' class='form-label'>Saldo</label>
                        <input type='number' class='form-control' name='saldo".$i."' min='1' max='500'>
                    </div>";
                    
        }

        echo "<button type='submit' name='empezar' class='btn btn-primary'>Enviar</button>";

        echo "</form>";
    }



    //FIN FUNCIONES -------------------------------------

?>