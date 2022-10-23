<?php
session_start();
?>
<?php
include_once("cabecera.php");
?>

	<?php

	$proyectos = array(
		array("id" => 1, "nombre" => "proyecto1", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 1),
		array("id" => 2, "nombre" => "proyecto2", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 2),
		array("id" => 3, "nombre" => "proyecto3", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 3)
	);
	if (!isset($_SESSION['proyectos'])){
		$_SESSION['proyectos'] = $proyectos;

	}
	
	echo "<table class='table table-striped'>
	<thead class='table-light'>
	<tr>
	<td><strong>NOMBRE</strong></td>
	<td><strong>FECHA INICIO</strong></td>
	<td><strong>FECHA FINAL</strong></td>
	<td><strong>DIAS TRANSCURRIDOS</strong></td>
	<td><strong>PORCENTAJE</strong></td>
	<td><strong>PRIORIDAD</strong></td>
	</tr>
	</thead>
	<tbody>";
	foreach ($_SESSION['proyectos'] as $key => $value) {
		echo "<tr>
		<td>" . $value["nombre"] . "</td>
		<td>" . $value["fechaIni"] . "</td>
		<td>" . $value["fechaFin"] . "</td>
		<td>" . $value["diasTranscurridos"] . "</td>
		<td>" . $value["porcentaje"] . "</td>
		<td>" . $value["prioridad"] . "</td>
		<td><a href='controlador.php?accion=info&id=".$key."' class='btn btn-success'>Ver</a></td>
		<td><a href='controlador.php?accion=eliminar&id=".$key."' class='btn btn-danger'>Borrar</a></td>
		</tr>";
	}
	echo "</tbody>
	</table>";

	
	
		


	?>


<?php
include_once("pie.php");
?>