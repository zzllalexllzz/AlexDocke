<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-8 themed-grid-col">
	<div class="flex-shrink-0 p-3 bg-white">
		<?php
		$num = rand(1, 99);
		echo $num;
		echo "<br>";
		$d = intval($num / 10);
		$u = ($num % 10) / 1;


		$p = "";
		$die = "";
		$di = "";
		$ve = "";

		switch ($u) {
			case 0:
				$p = "cero";
				break;
			case 1:
				$p = "uno";
				break;
			case 2:
				$p = "dos";
				break;
			case 3:
				$p = "tres";
				break;
			case 4:
				$p = "cuatro";
				break;
			case 5:
				$p = "cinco";
				break;
			case 6:
				$p = "seis";
				break;
			case 7:
				$p = "siete";
				break;
			case 8:
				$p = "ocho";
				break;
			case 9:
				$p = "nueve";
				break;
		}

		if ($d == 1 && $u == 0) {
			$di = "diez";
		} elseif ($d == 1 && $u == 1) {
			$di = "once";
		} elseif ($d == 1 && $u == 2) {
			$di = "doce";
		} elseif ($d == 1 && $u == 3) {
			$di = "trece";
		} elseif ($d == 1 && $u == 4) {
			$di = "catorce";
		} elseif ($d == 1 && $u == 5) {
			$di = "quince";
		} elseif ($d == 1 && $u == 6) {
			$di = "dieciseis";
		} elseif ($d == 1 && $u == 7) {
			$di = "diecisiete";
		} elseif ($d == 1 && $u == 8) {
			$di = "dieciocho";
		} elseif ($d == 1 && $u == 9) {
			$di = "diecinueve";
		}

		if ($d == 2 && $u == 0) {
			$ve = "veinte";
		} elseif ($d == 2 && $u == 1) {
			$ve = "veintiuno";
		} elseif ($d == 2 && $u == 2) {
			$ve = "veintidos";
		} elseif ($d == 2 && $u == 3) {
			$ve = "veintres";
		} elseif ($d == 2 && $u == 4) {
			$ve = "veinticuatro";
		} elseif ($d == 2 && $u == 5) {
			$ve = "veinticinco";
		} elseif ($d == 2 && $u == 6) {
			$ve = "veintiseis";
		} elseif ($d == 2 && $u == 7) {
			$ve = "veintisiete";
		} elseif ($d == 2 && $u == 8) {
			$ve = "veintiocho";
		} elseif ($d == 2 && $u == 9) {
			$ve = "veintinueve";
		}

		switch ($d) {
			case 3:
				$die = "treinta";
				break;
			case 4:
				$die = "cuarenta";
				break;
			case 5:
				$die = "cincuenta";
				break;
			case 6:
				$die = "sesenta";
				break;
			case 7:
				$die = "setenta";
				break;
			case 8:
				$die = "ochenta";
				break;
			case 9:
				$die = "noventa";
				break;
		}


		if ($num < 10) {
			echo $p;
		} elseif ($num < 20) {
			echo $di;
		} elseif ($num < 30) {
			echo $ve;
		} elseif ($num < 100) {
			if ($num % 10 == 0) {
				echo $die;
			} else {
				echo $die . " y " . $p;
			}
		}






		?>

	</div>
</div>