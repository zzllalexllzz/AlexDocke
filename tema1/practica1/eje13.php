<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        $array1 = array();

        //añade un elemento al array
        function insertar(&$array, $num)
        {
            array_push($array, $num);
        }

        //quita un elemento del array
        function eliminar(&$array, $num)
        {
            for ($i = 0; $i < $num; $i++) {
                array_shift($array);
            }
        }

        //pinta el array
        function mostrarArray($array)
        {
            for ($i = 0; $i < count($array); $i++) {
                echo $array[$i] . " ";
            }
        }

        insertar($array1, 1);
        insertar($array1, 2);
        insertar($array1, 3);
        mostrarArray($array1);
        echo "<br>";
        eliminar($array1, 1);
        mostrarArray($array1);


        ?>
    </div>
</div>
