<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
            $cad1="hola a todo el mundo ";
			$cad2="mi nombre es Alexander Barahona Ramos";
			
			$cad3=$cad1.$cad2;
			echo($cad3);
			echo("<br>");
			$cad1=$cad1.$cad2;
			echo($cad1);


		?>
	</div>
</div>
</div>

