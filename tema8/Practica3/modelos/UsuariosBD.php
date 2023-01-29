<?php 
class UsuariosBD {

    public static function chequearLogin($login, &$usuarioOBJ) {
        $conexion = ConexionBD::conectar();

        $coleccion = $conexion->usuarios;

        $usuario = $coleccion->findOne(['email' => $login['email'], 'password' => $login['password']]);

        $usuarioOBJ = new Usuarios($usuario['nombre'], $usuario['email'], $usuario['password']);
        $usuarioOBJ->setId($usuario['id']);

        //Si no me devuelve ninguna fila el password es incorrecto
        if ($usuario == null) {
            return 0;
        } else {
            //Usuario existe y password correcto 
            ConexionBD::cerrar();
            return 1;
        }
    }
}
?>