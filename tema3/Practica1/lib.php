
<?php
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

//pinta todos los proyectos sin el id
function pintarProyectos($array)
{
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
    foreach ($array as $key => $value) {
        echo "<tr>
		<td>" . $value["nombre"] . "</td>
		<td>" . $value["fechaIni"] . "</td>
		<td>" . $value["fechaFin"] . "</td>
		<td>" . $value["diasTranscurridos"] . "</td>
		<td>" . $value["porcentaje"] . "</td>
		<td>" . $value["prioridad"] . "</td>
		<td><a href='controlador.php?accion=info&id=" . $key . "' class='btn btn-success'>Ver</a></td>
		<td><a href='controlador.php?accion=eliminar&id=" . $key . "' class='btn btn-danger'>Borrar</a></td>
		</tr>";
    }
    echo "</tbody>
	</table>";
}

//metodo que asegura que la password sea con mas 8 caracteres y una mayuscula
function passwordSeguro($cadena) {
    $cont=0;
    $cont = preg_match_all('/([A-Z]{1})/',$cadena);
    if ($cont==1 && strlen($cadena)>8 ) {
        echo '<script>window.location="' . "proyectos.php" . '"</script>';
    } else {
        $error="contraseña incorrecta";
        echo '<script>window.location="' . "login.php?error=".$error."" . '"</script>';
    }
}

//pinta el formulario que se necesita para añadir
//el nuevo proyecto.
function pintarNuevoProyecto(){
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
}
?>
   

    