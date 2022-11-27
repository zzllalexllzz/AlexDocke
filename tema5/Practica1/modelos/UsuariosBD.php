<?php 
class UsuariosBD {

    //metodo que seleciona todos los usuarios de la base de datos y devuelve un un array de arrays de usuarios
    public static function getUsuarios() {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT * FROM usuarios");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuarios');

        ConexionBD::cerrar();

        return $usuarios;
    }
}
?>