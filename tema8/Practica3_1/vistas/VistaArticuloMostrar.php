<?php
class  VistaArticuloMostrar{

    public static function render($articulos){

        include "./cabecera.php";

        echo ' <div class="album py-5 bg-info-subtle">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">';

        //Para cada articulo, la pinto en un card
        foreach($articulos as $articulo) {

            echo '<div class="col">
            <div class="card shadow-sm">
                <img src="'.$articulo->getImagen().'" class="img-fluid" alt="...">

            <div class="card-body">
                <h3 class="card-text">'.$articulo->getTitulo().'</h3>
                <p class="card-text">'.$articulo->getTexto().'</p>
                <p class="card-text"><b>Fecha: '.$articulo->getfecha().'</b></p>
            </div>
            </div>
        </div>';
        }

        echo "</div></div></div>";

        include "./pie.php";
    }
}

?>