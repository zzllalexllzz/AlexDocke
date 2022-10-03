<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
            $num=0;
           for ($i=0; $i <= 6; $i++) { 
            $num=rand(1,49);
            echo $num." ";
           }
           echo "<br>";
           $num2=rand(1,9);
           echo "reintegro: ".$num2;

		?>
	</div>
</div>
