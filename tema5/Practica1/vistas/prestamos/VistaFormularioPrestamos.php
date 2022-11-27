<?php 
class VistaFormularioPrestamos {

    //metodo que pinta el formulario para insertar el prestamo
    public static function render($usuarios,$libros){
        //var_dump($usuarios);
        include_once("./cabecera.php");
        echo " <div class='container'>
    
        <!-- Outer Row -->
        <div class='row justify-content-center'>
            <div class='col-xl-10 col-lg-12 col-md-9'>
                <div class='card o-hidden border-0 shadow-lg my-5'>
                    <div class='card-body p-0'>
                        <div class='p-5'>
                            <div class='text-center'>
                                <h1 class='h4 text-gray-900 mb-4'>AÑADIR PRESTAMOS</h1>
                            </div>
                            <form class='user' action='enrutador.php' method='POST'>
                                <div class='form-group'>
                                    <select name='idUsuario' class='form-control '>
                                    <option selected>Usuario</option>";
                                    
                                    foreach ($usuarios as $usuario) {
                                        echo"<option value='".$usuario->getId()."'>".$usuario->getNombre()."</option>";
                                    }
                                echo"</select>
                                        
                                </div>
                                <div class='form-group'>
                                    <select name='idLibro' class='form-control '>
                                    <option selected>Libro</option>";
                                    
                                    foreach ($libros as $libro) {
                                        echo"<option value='".$libro->getId()."'>".$libro->getTitulo()."</option>";
                                    }
                                echo"</select>
                                </div>
                                <div class='form-group'>
                                    <input type='date' name='fechaInicio' class='form-control '
                                        id='fechaInicio' placeholder='Fecha Inicio'>
                                </div>
                                <div class='form-group'>
                                    <input type='date' name='fechaFin' min='1' class='form-control '
                                        id='fechaFin' placeholder='Fecha Fin'>
                                </div>
                                <div class='form-group'>
                                        <select name='estado' class='form-control '>
                                        <option selected>Estado</option>
                                        <option value='activo'>Activo</option>
                                        <option value='devuelto'>Devuelto</option>
                                        <option value='sobrepasado1Mes'>Sobrepasado1Mes</option>
                                        <option value='sobrepasado1Año'>Sobrepasado1Año</option>
                                      </select>
                                </div>
                                <input type='hidden' name='accion' value='crearPrestamo'>
                                <button type='submit' name='crearPrestamos' class='btn btn-success btn-user btn-block'>
                                    Crear Prestamo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>";
        include_once("./pie.php");
    }
}

?>