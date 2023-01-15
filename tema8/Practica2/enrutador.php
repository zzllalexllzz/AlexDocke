<?php
    //session_start();
    //session_destroy();

    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelo/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/$clase.php"; 
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

            //Mostrar series
            if ($_REQUEST['accion'] == "mostrarCampeones") {
                ControladorCampeones::mostrarCampeones();
            }

            //Mostrar series en detalle
            if ($_REQUEST['accion'] == "mostrarDetalle") {
                $id = filtrado($_GET['id']);
                ControladorCampeones::mostrarDetalle($id);
            }
            /*
            //Mostrar series por pagina
            if ($_REQUEST['accion'] == "mostrarCampeonesPagina") {
                ControladorCampeones::mostrarSeries($_GET['pagina']);
            }
            //Añadir votación a Mongo
            if ($_REQUEST['accion'] == "votar") {
                $id = filtrado($_REQUEST['id']); ;
                $valor = filtrado($_REQUEST['valor']);
                ControladorSeries::votarSerie($id, $valor);
            }
            */
           


        }
    }





?>