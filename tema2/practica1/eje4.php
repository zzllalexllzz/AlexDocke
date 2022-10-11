<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
		$a = 1;
		$b = 3;
		$c = 2;

		$res = (pow($b, 2) - 4 * $a * $c);

		if ($res <= 0) {
			echo "No tiene solucion";
		} else {
			$mas = (-$b + sqrt($res)) / (2 * $a);
			$menos = (-$b - sqrt($res)) / (2 * $a);

			echo "La suma : " . $mas . "<br>";
			echo "La resta : " . $menos . "<br>";
		}

		?>
	</div>
</div>