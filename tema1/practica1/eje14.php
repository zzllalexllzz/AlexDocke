<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        $array1 = array(
            array("nombre" => "alex1", "materia" => "dweser", "nota" => 1),
            array("nombre" => "alex2", "materia" => "hlc", "nota" => 2),
            array("nombre" => "alex3", "materia" => "dwecli", "nota" => 3),
            array("nombre" => "alex4", "materia" => "disweb", "nota" => 4),
            array("nombre" => "alex5", "materia" => "daweb", "nota" => 5),
            array("nombre" => "alex6", "materia" => "einem", "nota" => 6),
            array("nombre" => "alex7", "materia" => "dweser", "nota" => 7),
            array("nombre" => "alex8", "materia" => "hlc", "nota" => 8),
            array("nombre" => "alex9", "materia" => "dwecli", "nota" => 9),
            array("nombre" => "alex10", "materia" => "disweb", "nota" => 10)
        );

        //orderna el el array multidimencioanal por elemento 
        array_multisort(array_column($array1, "nombre"), SORT_DESC, array_column($array1, "nota"), $array1);

        //pinta el el arrar por el valor
        foreach ($array1 as $valor) {
            echo $valor["nombre"] . " - " . $valor["materia"] . " - " . $valor["nota"] . "<br>";
        }
        //la media de las notas
        echo array_sum(array_column($array1, "nota")) / count($array1);

        //
        function suspenso($nota){
            return $nota < 5;
        }

        echo "<br>";
        echo count(array_filter(array_column($array1, "nota"), "suspenso"));
        $ar = array();




        ?>
    </div>
</div>

