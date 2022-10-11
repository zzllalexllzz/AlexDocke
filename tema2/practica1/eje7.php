<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
           $array1=array(1,2,3,4,5);
        	$tabla=0;
           for ($i=1; $i <=10 ; $i++) { 
			foreach ($array1 as $valor) {
				echo $valor." x ".$i." = ".($valor*$i)."\n";
			}
			echo "<br>";
           }

		?>
	</div>
</div>
