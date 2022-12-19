<?php
class ControladorJugadores{

    //metodo que muestra el formulario del loguin
    public static function loginUser(){
        VistaJugadoresFormulario::render("");
    }

    //metodo que muestra el formulario con el error del usuario
    public static function loginUserError() {
        $mensaje = "Error de login, prueba otra vez";
        VistaJugadoresFormulario::render($mensaje);
    }

    //metodo que comprueba que el usuario existe el al base de datos
    public static function chequearLogin($login){
        $jugador = null;
        $valido = JugadoresBD::chequearLogin($login, $jugador);

        //Error login
        if ($valido == 0) {
            echo "<script>window.location='enrutador.php?accion=error';</script>";
        }

        //Login correcto
        if ($valido == 1) {
            $_SESSION['jugador'] = serialize($jugador);
            //echo $_SESSION['jugador'];
            echo "<script>window.location='enrutador.php?accion=mostrarPartidas';</script>";
        }
    }

}
?>