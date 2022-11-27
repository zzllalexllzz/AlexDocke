<?php

class PrestamosBD {

    //seleciona todos los prestamos de la BD.
    public static function getPrestamos() {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT prestamos.id, libros.titulo, usuarios.dni, prestamos.fechaInicio, prestamos.fechaFin, prestamos.estado FROM prestamos join libros join usuarios WHERE prestamos.idLibro = libros.id and prestamos.idUsuario = usuarios.id");

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $prestamos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamos');

        ConexionBD::cerrar();

        return $prestamos;
    }
    
    //inserta un prestamo en la tabla prestamos de la BD. 
    public static function insertPrestamos($prestamo) {
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("INSERT INTO prestamos (idUsuario, idLibro, fechaInicio, fechaFin, estado) VALUES (?, ?, ?, ?, ?)");
            // Bind
            $stmt->bindValue(1, $prestamo->getIdUsuario());
            $stmt->bindValue(2, $prestamo->getIdLibro());
            $stmt->bindValue(3, $prestamo->getFechaInicio());
            $stmt->bindValue(4, $prestamo->getFechaFin());
            $stmt->bindValue(5, $prestamo->getEstado());
            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //metodo que modifica la fecha fin y el estado segun el id  en la BD
    public static function modificarPrestamos($modifi) {
        $conexion = ConexionBD::conectar();

        try {
            //Insertar
            $stmt = $conexion->prepare("UPDATE prestamos SET fechaFin = ?, estado = ? WHERE id = ?");
            // Bind
            $stmt->bindValue(1, $modifi["fechaFin"]);
            $stmt->bindValue(2, $modifi["estado"]);
            $stmt->bindValue(3, $modifi["id"]);
           
            // Ejecuta la consulta
            $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        ConexionBD::cerrar();
    }

    //metodo que eleimina un prestamo segun el id en la BD
    public static function deletePrestamos($delePrestamo) {
        $conexion = ConexionBD::conectar();

        try {
            $stmt = $conexion->prepare("DELETE FROM prestamos WHERE id = ?");

            $stmt->bindValue(1, $delePrestamo["id"]);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ConexionBD::cerrar();//Cerrar la conexión
    }


    public static function selectPrestamos($selecPrestamo) {

        $conexion = ConexionBD::conectar();

        //Consulta BBDD
        $stmt = $conexion->prepare("SELECT prestamos.id, libros.titulo, usuarios.dni, prestamos.fechaInicio, prestamos.fechaFin, prestamos.estado FROM prestamos join libros join usuarios WHERE prestamos.idLibro = libros.id AND prestamos.idUsuario = usuarios.id AND idUsuario = ? AND estado = ?");

        $stmt->bindValue(1, $selecPrestamo["dni"]);
        $stmt->bindValue(2, $selecPrestamo["estado"]);

        $stmt->execute();

        //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
        $prestamos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Prestamos');

        ConexionBD::cerrar();

        return $prestamos;
    }
}
?>