<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
	<div class="p-3 bg-white">

		<?php
		$biblioteca = array(
			array("isbn" => 114, "titulo" => "Cuento de hadas", "descripcion" => "Stephen King regresa a la fantasía por todo lo alto con una novela magnífica sobre un inesperado héroe que deberá tomar parte en la épica batalla entre el bien y el mal.", "categoria" => "terror", "editorial" => "penguin random house", "foto" => "./img/1.gif", "precio" => 12.5),
			array("isbn" => 213, "titulo" => "Después", "descripcion" => "En ocasiones, para crecer debes vencer a tus demonios. Jamie Conklin, el único hijo de una madre soltera, solo quiere tener una infancia normal. Sin embargo, nació con una habili...", "categoria" => "terror", "editorial" => "penguin random house", "foto" => "./img/2.gif", "precio" => 15.4),
			array("isbn" => 312, "titulo" => "Billy Summers", "descripcion" => "Billy Summers es un asesino a sueldo y el mejor en lo suyo, pero tiene una norma: solo acepta un encargo si su objetivo es realmente mala persona. Ahora...", "categoria" => "scifi", "editorial" => "penguin random house", "foto" => "./img/3.gif", "precio" => 20.1),
			array("isbn" => 411, "titulo" => "El misterio de Salem's Lot", "descripcion" => "Salem's Lot es un pueblo tranquilo donde nunca pasa nada. O quizás esto son solo apariencias, pues lo cierto es que sí se están sucediendo diversos hechos misteriosos, incluso escalofriantes... ", "categoria" => "scifi", "editorial" => "penguin random house", "foto" => "./img/4.gif", "precio" => 17.8),
			array("isbn" => 510, "titulo" => "El visitante", "descripcion" => "Un niño de once años ha sido brutalmente asesinado. Todas las pruebas apuntan a uno de los ciudadanos más queridos de Flint City: Terry Maitland, entrenador en la liga infantil, profesor de literatura, marido ejemplar y padre de dos niñas.", "categoria" => "historia", "editorial" => "penguin random house", "foto" => "./img/5.gif", "precio" => 19, 2),
			array("isbn" => 69, "titulo" => "La última misión de Gwendy", "descripcion" => "La caja de botones de Gwendy. Cuando tenía doce años, Gwendy Peterson conoció a Richard Farris, un tipo misterioso que le pidió que cuidara de una extraña caja de botones. Ahor...", "categoria" => "historia", "editorial" => "penguin random house", "foto" => "./img/6.gif", "precio" => 30.1),
			array("isbn" => 78, "titulo" => "Carrie", "descripcion" => "Adolescencia, venganza y sangre, todo un hito en la literatura popular. Carrie, una joven de apariencia insignificante, acosada por sus compañeras de instituto, vive con su madre, una fanática religiosa.", "categoria" => "novela", "editorial" => "penguin random house", "foto" => "./img/7.gif", "precio" => 13.2),
			array("isbn" => 87, "titulo" => "Apocalipsis", "descripcion" => "El libro en el que se basa la serie de The Stand Un virus gripal, creado artificialmente como posible arma bacteriológica, se extiende por Estados Unidos y el mundo, provoca...", "categoria" => "novela", "editorial" => "penguin random house", "foto" => "./img/8.gif", "precio" => 11.5),
			array("isbn" => 96, "titulo" => "La història de la Lisey", "descripcion" => "Han pasado dos años desde que Lisey perdió a su marido, con quien había compartido veinticinco años de matrimonio. Scott era un novelista premiado, con gran éxito, y un hombre...", "categoria" => "terror", "editorial" => "penguin random house", "foto" => "./img/9.gif", "precio" => 16.2),
			array("isbn" => 105, "titulo" => "Misery", "descripcion" => "Estaba loca, pero él la necesitaba. Misery Chastain ha muerto. Paul Sheldon la ha matado. Con alivio y hasta con alegría. Misery lo ha hecho rico. Porque Misery es la heroína que ha protagonizado sus exitosos libros.", "categoria" => "novela", "editorial" => "penguin random house", "foto" => "./img/10.gif", "precio" => 23.5),
			array("isbn" => 114, "titulo" => "La cúpula", "descripcion" => "Una historia apocalíptica e hipnótica. Totalmente fascinante. Lo mejor de Stephen King. Es una soleada mañana de otoño en la pequeña ciudad de Chester's Mill. Claudette Sanders disfruta de su clase de vuelo y Dale Barbara, Barbie para los amigos, hace autostop en las afueras.", "categoria" => "terror", "editorial" => "penguin random house", "foto" => "./img/11.gif", "precio" => 29.8),
			array("isbn" => 123, "titulo" => "La larga marcha", "descripcion" => "Una inquietante novela futurista donde la realidad supera a la fantasía más terrorífica. El escenario: una sociedad ultraconservadora que ha llevado al paroxismo sus rasgos más perversos, dominada por un estado policial.", "categoria" => "scifi", "editorial" => "penguin random house", "foto" => "./img/12.gif", "precio" => 14.2),
			array("isbn" => 132, "titulo" => "El fugitivo", "descripcion" => "Una angustiante novela del maestro de terror Stephen King sobre un aterrador futuro donde la televisión es la única realidad. A mediados del siglo XXI, un concurso televisivo, cuyo principal atractivo es la muerte de los participantes, bate récords de audiencia.", "categoria" => "historia", "editorial" => "penguin random house", "foto" => "./img/13.gif", "precio" => 19.1),
			array("isbn" => 141, "titulo" => "El Instituto", "descripcion" => "En mitad de la noche en un barrio tranquilo de Minneapolis raptan a Luke Ellis, de doce años, tras haber asesinado a sus padres. Una operación que dura menos de dos minutos. Luke se despierta en l...", "categoria" => "novela", "editorial" => "penguin random house", "foto" => "./img/14.gif", "precio" => 13.9),
			array("isbn" => 150, "titulo" => "It", "descripcion" => "¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano?¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso?", "categoria" => "terror", "editorial" => "penguin random house", "foto" => "./img/15.gif", "precio" => 13, 9),
		);

		
		echo "<div class='container'>";
		echo "<div class='row g-5'>";
		echo"<h1>LIBRERIA JAROSO 2022</h1>";
		echo"<h2>TERROR</h2>";

		$cont=0;
		$cont1=0;
		$cont2=0;
		$cont3=0;
		
		foreach ($biblioteca as $key => $value) {

			if (strcmp($value["categoria"], "terror") === 0 && $cont<4) {
				echo "<div class='card' style='width: 18rem; margin-left:40px;'>
  					<img src='" . $value["foto"] . "' class='card-img-top' alt='...'>
  					<div class='card-body'>
   						<h5 class='card-title'>" . $value["titulo"] . "</h5>
    					<p class='card-text'>" . $value['descripcion'] . "</p>
    					<a href='#' class='btn btn-primary'>".$value["precio"]." €</a>
  					</div>
				</div>";
				$cont++;
			}
		}
		echo"<h2>HISTORIA</h2>";
		foreach ($biblioteca as $key => $value) {

			if (strcmp($value["categoria"], "historia") === 0 && $cont1<4) {
				echo "<div class='card' style='width: 18rem; margin-left:40px;'>
  					<img src='" . $value["foto"] . "' class='card-img-top' alt='...'>
  					<div class='card-body'>
   						<h5 class='card-title'>" . $value["titulo"] . "</h5>
    					<p class='card-text'>" . $value['descripcion'] . "</p>
    					<a href='#' class='btn btn-primary'>".$value["precio"]." €</a>
  					</div>
				</div>";
				$cont1++;
			}
		}
		echo"<h2>CIENCIA FICCION</h2>";
		foreach ($biblioteca as $key => $value) {

			if (strcmp($value["categoria"], "scifi") === 0 && $cont2<4) {
				echo "<div class='card' style='width: 18rem; margin-left:40px;'>
  					<img src='" . $value["foto"] . "' class='card-img-top' alt='...'>
  					<div class='card-body'>
   						<h5 class='card-title'>" . $value["titulo"] . "</h5>
    					<p class='card-text'>" . $value['descripcion'] . "</p>
    					<a href='#' class='btn btn-primary'>".$value["precio"]." €</a>
  					</div>
				</div>";
				$cont2++;
			}
		}
		echo"<h2>NOVELA</h2>";
		foreach ($biblioteca as $key => $value) {

			if (strcmp($value["categoria"], "novela") === 0 && $cont3<4) {
				echo "<div class='card' style='width: 18rem; margin-left:40px;'>
  					<img src='" . $value["foto"] . "' class='card-img-top' alt='...'>
  					<div class='card-body'>
   						<h5 class='card-title'>" . $value["titulo"] . "</h5>
    					<p class='card-text'>" . $value['descripcion'] . "</p>
    					<a href='#' class='btn btn-primary'>".$value["precio"]." €</a>
  					</div>
				</div>";
				$cont3++;
			}
		}
		
		echo "</div>";
		echo "</div>";
		?>

	</div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>