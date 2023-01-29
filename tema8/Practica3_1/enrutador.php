<?php
    //session_start();
    //session_destroy();

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

            //pinta el formulario de login usuarios
            if ($_REQUEST['accion'] == "inicio") {

                ControladorArticulo::mostrarArticulos();
            }

        }
    }





?>