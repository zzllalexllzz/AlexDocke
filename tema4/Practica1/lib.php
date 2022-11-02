<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

//pinta todos los proyectos en una tabla sin el id
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
    $cont = preg_match_all('/([A-Z]){2}/',$cadena);//metodo q cuenta las mayusculas que aparecen en el password
    if ($cont==1 && strlen($cadena)>8 ) {
		header("Location: proyectos.php");
    } else {
        $error="Contraseña Incorrecta (8 caracteres min y alguna mayuscula)";
		header("Location: login.php?error=$error");
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
							
							<button type='submit' name='nuevoProyecto' class='btn btn-primary btn-user btn-block'>
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

//metodo para generar un pdf de los proyectos.
function generarPdf($proyectos) {
	// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Alexander Barahona');
$pdf->setTitle('Proyectos de mi empresa');
$pdf->setSubject('Proyectos');
$pdf->setKeywords('PDF, PDF,proyectos');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$pdf->SetFont('dejavusans', 'B', 24);
$pdf->Cell(0, 10, 'Tabla de mis proyectos PHP', 0, 1);
$pdf->ln();
$pdf->setFont('dejavusans', '', 12, '', true);
    $html= "<table class='table table-striped'>
	<thead class='table-light'>
	<tr>
	<td><strong>Nombre</strong></td>
	<td><strong>Fecha Inicio</strong></td>
	<td><strong>Fecha Final</strong></td>
	<td><strong>Dias Transcurridos</strong></td>
	<td><strong>Porcentaje</strong></td>
	<td><strong>Prioridad</strong></td>
	</tr>
	</thead>
	<tbody>";
    foreach ($proyectos as $value) {
        $html.= "<tr>
		<td>" . $value["nombre"] . "</td>
		<td>" . $value["fechaIni"] . "</td>
		<td>" . $value["fechaFin"] . "</td>
		<td>" . $value["diasTranscurridos"] . "</td>
		<td>" . $value["porcentaje"] . "</td>
		<td>" . $value["prioridad"] . "</td>
		</tr>";
    }
    $html.= "</tbody>
	</table>";


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

echo "Generando ...";

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$flujo = $pdf->Output('Proyectos.pdf', 'S');
file_put_contents("Proyectos.pdf", $flujo);

echo "Generado.";

//============================================================+
// END OF FILE
//============================================================+
}
/**********************************************************************/ 
//metodo para enviar un correo el pdf que haviamos creado anterior mente
function enviarPdf($email) {
	//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $email;                     //SMTP username
    $mail->Password   = 'pkwwbiehgvaaajee';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, 'Alexander BR');
    $mail->addAddress($email, 'Alumno');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('./Proyectos.pdf', 'Proyectos.pdf');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Correo de mi página de proyectos';
    $mail->Body    = 'Este el cuerpo del mensaje <b>ojo, viene con adjunto!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>