<?php

    //AUTOLOAD
    function autocarga($clase){
        $ruta = "./controladores/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./modelos/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/libros/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/prestamos/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/usuarios/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }
    }
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //llama a la accion -> inicio
            if ($_REQUEST['accion'] == "inicio") {
                ControladorPrestamos::mostrarPrestamos();
            }

            //Nuevo prestamo
            if ($_REQUEST['accion'] == "nuevoPrestamo") {
                ControladorPrestamos::nuevoPrestamo();
            }

            //Crear noticia en BD
            if ($_REQUEST['accion'] == "crearPrestamo") {
                $prestamo["idUsuario"] = filtrado($_REQUEST['idUsuario']);
                $prestamo["idLibro"] = filtrado($_REQUEST['idLibro']);
                $prestamo["fechaInicio"] = filtrado($_REQUEST['fechaInicio']);
                $prestamo["fechaFin"] = filtrado($_REQUEST['fechaFin']);
                $prestamo["estado"] = filtrado($_REQUEST['estado']);

                ControladorPrestamos::crearPrestamo($prestamo);
            }

            //recoge los datos del formulario para modificar el prestamo elegido
            if ($_REQUEST['accion'] == "modifiPrestamo") {
                $modiPrestamo["fechaFin"] = filtrado($_REQUEST['fechaFin']);
                $modiPrestamo["estado"] = filtrado($_REQUEST['estado']);
                $modiPrestamo["id"] = filtrado($_REQUEST['id']);
                ControladorPrestamos::modificarPrestamo($modiPrestamo);
            }

            //recoge el id para asi borrar el prestamo
            if ($_REQUEST['accion'] == "borrarPrestamo") {
                $delePrestamo["id"] = filtrado($_REQUEST['iddel']);
                ControladorPrestamos::eliminarPrestamo($delePrestamo);
            }

            //recopila el estado y lo envia al controlador  buscar prestamo
            if ($_REQUEST['accion'] == "buscarxEstado") {
                $selecEstado["estado"] = filtrado($_REQUEST['estado']);
                ControladorPrestamos::buscarEstado($selecEstado);
            }

            //recopila el dni y lo envia al controlador  buscar prestamo
            if ($_REQUEST['accion'] == "buscarxDni") {
                $selecDni["dni"] = filtrado($_REQUEST['dni']);
                ControladorPrestamos::buscarDni($selecDni);
            }
        }
    }





?>