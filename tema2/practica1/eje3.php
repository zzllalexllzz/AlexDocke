<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
            $radio=rand(0,100);
            $volumen=(4/3)*3.14*pow($radio,3);
            echo "El volumen es: ".$volumen;

		?>
	</div>
</div>
</div>

