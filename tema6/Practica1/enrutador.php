<?php
session_start();
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

        $ruta = "./vistas/libros/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/regalos/$clase.php";
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

            //pinta el formulario de login usuarios
            if ($_REQUEST['accion'] == "inicio") {
                ControladorUsuario::loginUser();
            }

            //si el usuario no existe pinta el formulario con el error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorUsuario::loginUserError();
            }

            //metodo que pinta  los regalos del usuario logueado
            if ($_REQUEST['accion'] == "mostrarRegalos") {
                $id = unserialize( $_SESSION["usuario"])->getId();
                ControladorRegalos::mostrarRegalos($id);
            }

            //checklogin metodo que verifica el email y password
            if ($_REQUEST['accion'] == "checkLogin") {
                $login["email"] = filtrado($_REQUEST['email']);
                $login["password"] = filtrado($_REQUEST['password']);
                ControladorUsuario::chequearLogin($login);
            }
            //almacena los dados cambiados para su modificacion
            if ($_REQUEST['accion'] == "modificarRegalo") {
                $regalo["nombre"] = filtrado($_REQUEST['nombre']);
                $regalo["destinatario"] = filtrado($_REQUEST['destinatario']);
                $regalo["precio"] = filtrado($_REQUEST['precio']);
                $regalo["estado"] = filtrado($_REQUEST['estado']);
                $regalo["anio"] = filtrado($_REQUEST['anio']);
                $regalo["id"] = filtrado($_REQUEST['id']);

                ControladorRegalos::modificarRegalo($regalo);
            }
            if ($_REQUEST['accion'] == "checkLogin") {
                $login["email"] = filtrado($_REQUEST['email']);
                $login["password"] = filtrado($_REQUEST['password']);
                ControladorUsuario::chequearLogin($login);
            }










        }
    }





?>