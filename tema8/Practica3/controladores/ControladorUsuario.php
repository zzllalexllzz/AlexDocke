<?php
class ControladorUsuario{

    //metodo que muestra el formulario del loguin
    public static function loginUser(){
        VistaUserFormulario::render("");
    }

    //metodo que muestra el formulario con el error del usuario
    public static function loginUserError() {
        $mensaje = "Error de login, prueba otra vez";
        VistaUserFormulario::render($mensaje);
    }

    //metodo que comprueba que el usuario existe el al base de datos
    public static function chequearLogin($login){
        $usuario = null;
        $valido = UsuariosBD::chequearLogin($login, $usuario);

        //Error login
        if ($valido == 0) {
            echo"<script>window.location='enrutador.php?accion=error';</script>";
        }

        //Login correcto
        if ($valido == 1) {
            $_SESSION['usuario'] = serialize($usuario);
            echo "<script>window.location='enrutador.php?accion=mostrarForm';</script>";
        }
    }

}
?>