<?php

class VistaPrestamosMostrarTodas {

    //metodo que pinta una tabla de todos los prestamos
    public static function render($prestamos,$usuarios) {
        include("./cabecera.php");
        echo "<table class='table table-striped text-center'>
                <thead class='table-light '>
                <tr>";
        echo "<form class='user' action='enrutador.php' method='POST'>
                <th>
                <div class='form-group'>
                    <select name='estado' class='form-control '>
                        <option selected>Estado</option>
                        <option value='activo'>Activo</option>
                        <option value='devuelto'>Devuelto</option>
                        <option value='sobrepasado1Mes'>Sobrepasado1Mes</option>
                        <option value='sobrepasado1Año'>Sobrepasado1Año</option>
                    </select>
                </div>
                </th>
                <td>
            <input type='hidden' name='accion' value='buscarxEstado'>
            <button type='submit' name='seleccionarPrestamosEst' class='btn btn-success btn-user btn-block'>
                Buscar Prestamos
            </button>
            </td>
            </form>
            ";
            echo "<form class='user' action='enrutador.php' method='POST'>
                <th>
                <div class='form-group'>
                    <select name='dni' class='form-control '>
                        <option selected>DNI Usuario</option>";
                        foreach ($usuarios as $usuario) {
                            echo"<option value='".$usuario->getId()."'>".$usuario->getDni()."</option>";
                        }

                   echo" </select>
                </div>
                </th>
                <td>
            <input type='hidden' name='accion' value='buscarxDni'>
            <button type='submit' name='buscarPrestamosDni' class='btn btn-success btn-user btn-block'>
                Buscar Prestamos
            </button>
            </td>
            </form>
            </tr>
            </table>";
//tabla de pretamos
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
        foreach ($prestamos as $key => $prestamo) {
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
        include("./pie.php");
        


        
    }

}
?>