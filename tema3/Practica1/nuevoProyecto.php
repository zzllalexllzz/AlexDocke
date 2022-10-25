<?php
session_start();//iniciamos la sesion
?>
<?php
include_once("cabecera.php");//incluimos la cabecera
include_once("lib.php");//incluimos el lib.php para obtener los metodos
?>

	<?php
	//pinta el formulario para obtener los datos del muevo proyecto
	pintarNuevoProyecto();
	?>


<?php
include_once("pie.php");
?>