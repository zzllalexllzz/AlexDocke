<?php
class ControladorUsuario{

    public static function loginUser(){
        VistaUserFormulario::render("");
    }
    public static function loginUserError() {
        $mensaje = "Error de login, prueba otra vez";
        VistaUserFormulario::render($mensaje);
    }
    public static function chequearLogin($login){
        $usuario = null;
        $valido = UsuariosBD::chequearLogin($login, $usuario);

        //Error login
        if ($valido == 0) {
            echo "<script>window.location='enrutador.php?accion=error';</script>";
        }

        //Login correcto
        if ($valido == 1) {
            $_SESSION['usuario'] = serialize($usuario);
            echo "<script>window.location='enrutador.php?accion=mostrarRegalos';</script>";
        }
    }
}
?>