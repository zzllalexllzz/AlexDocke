<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
		$num1 = rand(0, 100);
		$num2 = rand(0, 100);

		echo ("la diferencia entre num1 y num2 es: ".($num1 - $num2));
		echo("<br>");
		echo("la division entre num1 y num2 es: ".($num1/$num2));

		?>
	</div>
</div>


