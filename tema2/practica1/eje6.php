<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
            $ar=array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
            $dni="30847150x";
            $letraDni=substr($dni, 8,9);
            
            echo "Letra del dni: ".$letraDni;
            echo "<br>";
            $numDni=intval(substr($dni,0,9));
            $resto = $numDni%23;
            $ar1=$ar[$resto];
          
            echo "Letra obtenida del resto: ".$ar1;

            

		?>
	</div>
</div>
