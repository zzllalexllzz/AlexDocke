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

        $ruta = "./vistas/jugando/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/partidas/$clase.php";
        if (file_exists($ruta)){
            include_once $ruta;
        }

        $ruta = "./vistas/jugadores/$clase.php";
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

                ControladorJugadores::loginUser();
            }

            //si el usuario no existe pinta el formulario con el error de login
            if ($_REQUEST['accion'] == "error") {

                ControladorJugadores::loginUserError();
            }

            //metodo que pinta  las partidas del usuario logueado
            if ($_REQUEST['accion'] == "mostrarPartidas") {

                ControladorPartidas::mostrarPartidas();
            }

            //checklogin metodo que verifica el email y password
            if ($_REQUEST['accion'] == "checkLogin") {
                $login["email"] = filtrado($_REQUEST['email']);
                $login["password"] = filtrado($_REQUEST['password']);

                ControladorJugadores::chequearLogin($login);
            }

            if ($_REQUEST['accion'] == "crearPartida") {
                $partida["fecha"] = filtrado($_REQUEST['fecha']);
                $partida["hora"] = filtrado($_REQUEST['hora']);
                $partida["ciudad"] = filtrado($_REQUEST['ciudad']);
                $partida["lugar"] = filtrado($_REQUEST['lugar']);
                $partida["cubierto"] = filtrado($_REQUEST['cubierto']);
                $partida["estado"] = filtrado($_REQUEST['estado']);

                $partida["jugador"] = filtrado(unserialize($_SESSION['jugador'])->getId());

                ControladorPartidas::nuevaPartida($partida);
            }


            if ($_REQUEST['accion'] == "buscarxFecha") {
                $partida["fecha"] = filtrado($_REQUEST['fecha']);

                ControladorPartidas::buscarFecha($partida);
            }


            if ($_REQUEST['accion'] == "buscarxCiudad") {
                $partida["ciudad"] = filtrado($_REQUEST['ciudad']);

                ControladorPartidas::buscarCiudad($partida);
            }

            if ($_REQUEST['accion'] == "verInfo") {

                $partida["id"] = filtrado($_REQUEST['id']);

                ControladorJugando::mostrarInfo($partida);
            }

            

        }
    }
?>