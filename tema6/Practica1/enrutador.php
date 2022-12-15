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

        $ruta = "./vistas/enlaces/$clase.php";
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

    //Función para subir imágenes al servidor
    function subirImagen() {

        $directorioSubida = "img/";
        $extensionesValidas = array("jpg", "png", "gif");
        if(isset($_FILES['imagen'])){
            $errores = array();
            $nombreArchivo = $_FILES['imagen']['name'];
            $directorioTemp = $_FILES['imagen']['tmp_name'];
            $tipoArchivo = $_FILES['imagen']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];
            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }

            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = $nombreArchivo . rand(1, 100);
            // Desplazamos el archivo si no hay errores
            if(empty($errores)){
                $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
                move_uploaded_file($directorioTemp, $nombreCompleto);
                //print "El archivo se ha subido correctamente";
            }
            return $nombreCompleto;
        }
    }

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

            //recoge el id para asi borrar el regalo
            if ($_REQUEST['accion'] == "borrarRegalo") {
                $deleRegalo["id"] = filtrado($_REQUEST['iddel']);

                ControladorRegalos::eliminarRegalo($deleRegalo);
            }

            //recoge los datos introducidos del formulario de nuevo regalo
            if ($_REQUEST['accion'] == "crearRegalo") {
                $regalo["nombre"] = filtrado($_REQUEST['nombre']);
                $regalo["destinatario"] = filtrado($_REQUEST['destinatario']);
                $regalo["precio"] = filtrado($_REQUEST['precio']);
                $regalo["estado"] = filtrado($_REQUEST['estado']);
                $regalo["anio"] = filtrado($_REQUEST['anio']);
                $regalo["idUsuario"] = filtrado($_REQUEST['idUsuario']);

                ControladorRegalos::nuevoRegalo($regalo);
            }

            //recoge los datos para buscar por año
            if ($_REQUEST['accion'] == "buscarxAnio") {
                $busAnio["id"] = unserialize( $_SESSION["usuario"])->getId();
                $busAnio["anio"] = filtrado($_REQUEST['anio']);

                ControladorRegalos::buscarRegaloAnio($busAnio);
            }

            //recoge los datos para ver los enlaces de un regalo
            if ($_REQUEST['accion'] == "verEnlaces") {
                $id = filtrado($_REQUEST['id']);

                ControladorEnlaces::mostrarEnlaces($id);
            }

            //recoge el id para asi borrar un elace del regalo determinado
            if ($_REQUEST['accion'] == "borrarEnlace") {
                $delEnlace["id"] = filtrado($_REQUEST['iddel']);
                $delEnlace["idRegalo"] = filtrado($_REQUEST['idRegalo']);

                ControladorEnlaces::eliminarEnlace($delEnlace);
            }

            //recoge los datos introducidos del formulario de nuevo enlace
            if ($_REQUEST['accion'] == "crearEnlace") {
                $enlace["idRegalo"] = filtrado($_REQUEST['idRegalo']);
                $enlace["nombre"] = filtrado($_REQUEST['nombre']);
                $enlace["web"] = filtrado($_REQUEST['web']);
                $enlace["precio"] = filtrado($_REQUEST['precio']);
                $enlace["imagen"] = subirImagen();
                $enlace["prioridad"] = filtrado($_REQUEST['prioridad']);

                ControladorEnlaces::nuevoEnlace($enlace);
            }

            //recoge los datos para ver los enlaces de un regalo ordenados Acendentemente
            if ($_REQUEST['accion'] == "ordenarEnlaceA") {
                $id = filtrado($_REQUEST['id']);

                ControladorEnlaces::mostrarEnlacesOrdA($id);
            }

            //recoge los datos para ver los enlaces de un regalo ordenados Decendentemente
            if ($_REQUEST['accion'] == "ordenarEnlaceD") {
                $id = filtrado($_REQUEST['id']);

                ControladorEnlaces::mostrarEnlacesOrdD($id);
            }

            if ($_REQUEST['accion'] == "generarPDF") {

                $id = unserialize( $_SESSION["usuario"])->getId();

                ControladorUsuario::generarPdf($id);
            }
        }
    }

?>