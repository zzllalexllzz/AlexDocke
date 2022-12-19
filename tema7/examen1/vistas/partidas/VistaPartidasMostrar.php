<?php

class VistaPartidasMostrar {

    //metodo que pinta una tabla  de los partidas de un usuario
    public static function render($partidas) {
        include("./cabecera.php");
        echo "<table class='table table-striped text-center'>
                <thead class='table-light '>
                <tr>";
        echo "<form class='user' action='enrutador.php' method='POST'>
                <th>
                <div class='form-group'>
                    <input type='date' name='fecha' class='form-control' placeholder='Fecha'>
                </div>
                </th>
                <td>
                    <input type='hidden' name='accion' value='buscarxFecha'>
                    <button type='submit' name='seleccionarPrestamosEst' class='btn btn-success btn-user btn-block'>Buscar por Fecha</button>
                </td>
            </form>";
         echo "<form class='user' action='enrutador.php' method='POST'>
                <th>
                <div class='form-group'>
                    <input type='text' name='ciudad'  class='form-control' value='' placeholder='Ciudad'>
                </div>
                </th>
                <td>
                <input type='hidden' name='accion' value='buscarxCiudad'>
                <button type='submit' class='btn btn-success btn-user btn-block'>Buscar por Ciudad</button>
                </td>
            </form>
            </tr>
            </table>";
    echo "<table class='table table-striped text-center'>
            <thead >
                <tr>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>CIUDAD</th>
                    <th>LUGAR</th>
                    <th>CUBIERTO</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($partidas as $key => $partida) {
            //modificar datos
            echo "<tr>
                    <td>" . $partida->getFecha() . "</td>
                    <td>" . $partida->getHora() . "</td>
                    <td>" . $partida->getCiudad() . "</td>
                    <td>" . $partida->getLugar()."</td>
                    <td>" . $partida->getCubierto() . "</td>
                    <td>" . $partida->getEstado() . "</td>
                    <td><a class='btn btn-outline-primary' href='enrutador.php?accion=verInfo&id=".$partida->getId()."' role='button'><i class='bi bi-info-square'></i></a></td>
                </tr>";

        }
        echo "</tbody>
        </table>";
        include_once("./pie.php");

    }



}
?>