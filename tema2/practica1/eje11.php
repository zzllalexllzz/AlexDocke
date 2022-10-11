<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php

        $array1 = [];

        //crear matriz
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($i == $j) {
                    $array1[$i][$j] = 1;
                } else {
                    $array1[$i][$j] = rand(1, 9);
                }
            }
            echo "<br>";
        }
        //pinta matriz
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                echo $array1[$i][$j] . " "; 
            }
            echo "<br>";
        }

        //suma de las filas
        echo"suma de filas";
        for ($i = 0; $i < 7; $i++) {
            $sumFilas = 0;
            for ($j = 0; $j < 7; $j++) {
                $sumFilas+= $array1[$i][$j] ; 
            }
            echo " ".$sumFilas;
        }
        echo "<br>";

        //sumas de las columnas
        echo "sumas de columnas";
        for ($j = 0; $j < 7; $j++) {
            $sumColumnas = 0;
            for ($i = 0; $i < 7; $i++) {
                $sumColumnas+= $array1[$i][$j] ; 
            }
            echo " ".$sumColumnas;
        }

        ?>
    </div>
</div>


<?php
include_once("../pie.php");
?>