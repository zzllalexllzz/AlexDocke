<?php 
class VistaPrestamosBuscados{

    //metodoque pinta los pestamos buscador especificamente
    public static function render($presBuscados){
        //var_dump($presBuscados);
        include("./cabecera.php");
            echo "<table class='table table-striped text-center'>
            <thead class='table-light'>
            <tr>
            <th>TITULO</th>
            <th>DNI</th>
            <th>INICIO</th>
            <th>FINAL</th>
            <th>ESTADO</th>
            </tr>
            </thead>
            <tbody>";
        foreach ($presBuscados as $key => $buscado) {
            echo "<tr>
                <td>" . $buscado->titulo . "</td>
                <td>" . $buscado->dni . "</td>
                <td>" . $buscado->getFechaInicio() . "</td>
                <td>" . $buscado->getFechaFin() . "</td>
                <td>" . $buscado->getEstado() . "</td>
            </tr>";
        }
        echo "</tbody>
        </table>";
        include("./pie.php");
    }
    
}

?>