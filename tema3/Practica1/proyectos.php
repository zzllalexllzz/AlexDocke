<?php
session_start();
?>
<?php
include_once("cabecera.php");
include_once("lib.php");
?>

	<?php
	//array de proyectos
	$proyectos = array(
		array("id" => 1, "nombre" => "proyecto1", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 1),
		array("id" => 2, "nombre" => "proyecto2", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 2),
		array("id" => 3, "nombre" => "proyecto3", "fechaIni" => "2001/12/2", "fechaFin" => "2002/03/02", "diasTranscurridos" => 10, "porcentaje" => 25, "prioridad" => 3)
	);
	//ingresamos el arrays de proyectos  en la session
	if (!isset($_SESSION['proyectos'])){
		$_SESSION['proyectos'] = $proyectos;

	}
	
	//pinta los proyectos 
	pintarProyectos($_SESSION['proyectos']);

	?>


<?php
include_once("pie.php");
?>