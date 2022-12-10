<?php

class VistaRegalosMostrar {

    //metodo que pinta una tabla  de los regalos de un usuario
    public static function render($regalos) {
        include("./cabecera.php");

    //tabla de regalos
    echo "<table class='table table-striped text-center'>
            <thead >
                <tr>
                    <th>NOMBRE</th>
                    <th>DESTINATARIO</th>
                    <th>PRECIO</th>
                    <th>ESTADO</th>
                    <th>AÑO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($regalos as $key => $regalo) {
            echo "<tr>
            <form class='user' action='enrutador.php' method='post'>
                    <td><input type='text' name='nombre'  class='form-control' value='" . $regalo->getNombre() . "'></td>
                    <td><input type='text' name='destinatario'  class='form-control' value='" . $regalo->getDestinatario() . "'></td>
                    <td><input type='text' name='precio'  class='form-control' value='" . $regalo->getPrecio() . "'></td>
                    <td><select name='estado' class='form-control '>
                            <option selected>".$regalo->getEstado()."</option>
                            <option value='pendiente'>Pendiente</option>
                            <option value='comprando'>Comprado</option>
                            <option value='envuelto'>Envuelto</option>
                            <option value='entregado'>Entregado</option>
                    </select></td>
                    <td><input type='text' name='anio'  class='form-control' value='" . $regalo->getAnio() . "'></td>
                    <input type='hidden' name='id' value='".$regalo->getId()."'>
                    <td><input type='hidden' name='accion' value='modificarRegalo'>
                    <button type='submit' class='btn btn-outline-info '><i class='bi bi-pencil-square'></i></button></td>
                    </form>
                </tr>";

        }
        echo "</tbody>
        </table>";
        include("./pie.php");

    }
}
?>