<?php
class VistaJugandoMostrar{

    public static function render($partidas, $jugandos) {

        include("./cabecera.php");

        echo ' <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

        //Para cada enlace, la pinto en un card
        foreach($partidas as $partida) {

            echo '<div class="card" style="width: 18rem;">
            <div class="card-header">
              PARTIDA '.$partida->getId().'
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Fecha: '.$partida->getFecha().'</li>
              <li class="list-group-item">Hora: '.$partida->getHora().'</li>
              <li class="list-group-item">Ciudad: '.$partida->getCiudad().'</li>
              <li class="list-group-item">Lugar: '.$partida->getLugar().'</li>
              <li class="list-group-item">Cubierto: '.$partida->getCubierto().'</li>
              <li class="list-group-item">Estado: '.$partida->getEstado().'</li>
            </ul>
         
            </div>';
        }

        echo "</div></div></div>";
        echo ' <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="card" style="width: 18rem;">
            <div class="card-header">
              JUGADORES INSCRITOS
            </div>
            <ul class="list-group list-group-flush">';

        //Para cada enlace, la pinto en un card
        foreach($jugandos as $jugando) {

            echo '
              <li class="list-group-item">Fecha: '.$jugando["nombre"].$jugando["apodo"].$jugando["nivel"].'</li>
            ';
        }

        echo "</ul>
        
      </div></div></div></div>";
       


        include("./pie.php");
    }

}
?>


