<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        $array1 = array(
            "uno" => "one", "dos" => "two", "tres" => "three", "cuatro" => "four", "cinco" => "five",
            "seis" => "six", "siete" => "seven", "ocho" => "eight", "nueve" => "nine", "diez" => "ten",
            "once" => "eleven", "doce" => "twelve", "trece" => "thirteen", "catorce" => "fourteen",
            "quince" => "fifteen", "dieciseis" => "sixteen", "diecisiete" => "seventeen",
            "dieciocho" => "eighteen", "diecinueve" => "nineteen", "veinte" => "twenty"
        );
        
        $cl="";
        $palabra="cinco";
       
        
        
        foreach (array_keys($array1) as $key) {
            if ($key==$palabra) {
                $cl=$key;
            }
        }

        if ($cl==$palabra) {
            $re=$array1[$cl];
            echo "La traduccion en ingles es: ".$re;
        } else {
            echo "la palabra no existe";
        }
        echo "<br>";
        ksort($array1);

        foreach ($array1 as $key=> $val) {
            echo $key."<br>";
        }
        

        ?>
    </div>
</div>

