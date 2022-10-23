<?php
session_start();
?>
<?php
include_once("cabecera.php");
include_once("lib.php");
?>

	<?php
	echo " <div class='container'>

	<!-- Outer Row -->
	<div class='row justify-content-center'>
		<div class='col-xl-10 col-lg-12 col-md-9'>
			<div class='card o-hidden border-0 shadow-lg my-5'>
				<div class='card-body p-0'>
					<div class='p-5'>
						<div class='text-center'>
							<h1 class='h4 text-gray-900 mb-4'>AÑADIR PROYECTO</h1>
						</div>
						<form class='user' action='controlador.php' method='POST'>
							<div class='form-group'>
								<input type='text' name='nombre' class='form-control form-control-user'
									id='nombre' aria-describedby='emailHelp'
									placeholder='Nombre'>
							</div>
							<div class='form-group'>
								<input type='text' name='fechaIni' class='form-control form-control-user'
									id='fechaIni' placeholder='Fecha Inicio'>
							</div>
							<div class='form-group'>
								<input type='text' name='fechaFin' class='form-control form-control-user'
									id='fechaFin' placeholder='Fecha Fin'>
							</div>
							<div class='form-group'>
								<input type='number' name='diasTranscurridos' min='1' class='form-control form-control-user'
									id='diasTranscurridos' placeholder='Dias Transcurridos'>
							</div>
							<div class='form-group'>
								<input type='number' name='porcentaje' min='1' class='form-control form-control-user'
									id='porcentaje' placeholder='Porcentage'>
							</div>
							<div class='form-group'>
								<input type='number' name='prioridad' min='1' max='5' class='form-control form-control-user'
									id='prioridad' placeholder='Prioridad'>
							</div>
							
							<button type='hidden' name='nuevoProyecto' class='btn btn-primary btn-user btn-block'>
								Crear Proyecto
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</div>";

	?>


<?php
include_once("pie.php");
?>