<?php 
class VistaPrestamosBuscados{

    //metodoque pinta los pestamos buscador especificamente
    public static function render($presBuscados){
        //var_dump($presBuscados);
                include("./cabecera.php");
                echo "<table class='table table-striped text-center'>
                        <thead >
                            <tr>
                                <th>TITULO</th>
                                <th>DNI</th>
                                <th>INICIO</th>
                                <th>FINAL</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>";
        foreach ($presBuscados as $key => $prestamo) {
            echo "<tr>
            <td>" . $prestamo->titulo . "</td>
            <td>" . $prestamo->dni . "</td>
            <td>" . $prestamo->getFechaInicio() . "</td>

            <form class='user' action='enrutador.php' method='post'>
            <td><input type='date' name='fechaFin'  class='form-control '
            id='fechaFin' value='" . $prestamo->getFechaFin() . "'></td>
            <td> <select name='estado' class='form-control '>
                <option selected>".$prestamo->getEstado()."</option>
                <option value='activo'>Activo</option>
                <option value='devuelto'>Devuelto</option>
                <option value='sobrepasado1Mes'>Sobrepasado1Mes</option>
                <option value='sobrepasado1Año'>Sobrepasado1Año</option>
            </select></td>
            <input type='hidden' name='id' value='".$prestamo->getId()."'>
            <td><input type='hidden' name='accion' value='modifiPrestamo'>
            <button type='submit' name='modificarPrestamos' class='btn btn-outline-success '>
            <i class='bi bi-info-square'></i>
            </button>
            </td>
            </form>
            <form class='user' action='enrutador.php' method='post'>
            <input type='hidden' name='iddel' value='".$prestamo->getId()."'>
            <td><input type='hidden' name='accion' value='borrarPrestamo'>
            <button type='submit' name='delPrestamos' class='btn btn-outline-danger '>
            <i class='bi bi-trash'></i>
            </button></td>
            </form>
            </tr>";
            
        }
        echo "</tbody>
        </table>";
                echo "</tbody>
                </table>";
        include("./pie.php");
    }
    
}

?>