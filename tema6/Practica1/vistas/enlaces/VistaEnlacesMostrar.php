<?php
class VistaEnlacesMostrar{

    public static function render($enlaces) {

        include("./cabecera.php");
            echo"<table class='table table-striped text-center w-auto'>
                <tr>";
                echo"<form class='user' action='enrutador.php' method='post'>
                        <input type='hidden' name='id' value='".$_REQUEST["id"]."'>
                    <input type='hidden' name='accion' value='ordenarEnlaceA'>
                    <button type='submit' class='btn btn-outline-primary'>Ordenar Acendente</i></button>
                </form>
                <form class='user' action='enrutador.php' method='post'>
                        <input type='hidden' name='id' value='".$_REQUEST["id"]."'>
                    <input type='hidden' name='accion' value='ordenarEnlaceD'>
                    <button type='submit' class='btn btn-outline-primary'>Ordenar Decendente</i></button>
                </form>
                </tr>
            </table>";

        echo ' <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

        //Para cada enlace, la pinto en un card
        foreach($enlaces as $enlace) {

            echo '<div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="white"/><text class="text-center" x="50%" y="50%" fill="#eceeef" dy=".3em">'.$enlace->getNombre().'</text>
              <image href="'.$enlace->getImagen().'" width="100%" height="100%"/>
            </svg>

            <div class="card-body">
                <h3 class="card-text">'.$enlace->getNombre().'</h3>
                <p class="card-text"><a href="'.$enlace->getWeb().'" target="_blank">'.$enlace->getWeb().'</a></p>
                <p class="card-text">Precio: '.$enlace->getPrecio().'</p>
                <p class="card-text">Prioridad: '.$enlace->getPrioridad().'</p>
                    <form class="user" action="enrutador.php" method="post">
                        <input type="hidden" name="iddel" value="'.$enlace->getId().'">
                        <input type="hidden" name="idRegalo" value="'.$_REQUEST["id"].'">
                        <td>
                            <input type="hidden" name="accion" value="borrarEnlace">
                            <button type="submit" class="btn btn-outline-danger "><i class="bi bi-trash"></i></button>
                        </td>
                    </form>
            </div>
            </div>
        </div>';
        }

        echo "</div></div></div>";


        include("./pie.php");
    }

}
?>


