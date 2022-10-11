<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
            $array1=array(1,2,3,4,5,6,7,8,9,10);
            $sum=0;
            for ($i=0; $i < count($array1); $i++) { 
                if ($array1[$i]%2==0) {
                    $sum+=$array1[$i];
                }else {
                    echo $array1[$i].", ";
                }
            }
            echo "<br>";

            $media=$sum/10;
            echo "la media de los pares es: ".$media;
        ?>
    </div>
    </div>
