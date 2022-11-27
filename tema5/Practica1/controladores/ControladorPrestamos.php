<?php

    class ControladorPrestamos {

        //metodo que muestra los prestamos
        public static function mostrarPrestamos() {
            //LLamar al modelo para obtener todas las prestamos en un array de prestamos
            $prestamos = PrestamosBD::getPrestamos();
            //Llamar al modelo para obtener todos los usuarios
            $usuarios = UsuariosBD::getUsuarios();
            //Llamar a una vista para pintar esas prestamos
            VistaPrestamosMostrarTodas::render($prestamos, $usuarios);
        }

        //metodo que a travez de vistas pinta un formulario para enviar datos de prestamos 
        public static function nuevoPrestamo() {
            //LLamar al modelo para obtener todas las usuarios en un array de usuarios
            $usuarios = UsuariosBD::getUsuarios();
            //LLamar al modelo para obtener todas las libros en un array de libros
            $libros = LibrosBD::getLibros();
            //Llamar a una vista para pintar el formulario para insertar un prestamo
            VistaFormularioPrestamos::render($usuarios, $libros);
        }

        //metodo que crea un prestamo
        public static function crearPrestamo($prestamos) {
            //creamos un objeto prestamos 
            $prestamoA = new Prestamos($prestamos['idUsuario'],$prestamos['idLibro'],$prestamos['fechaInicio'],$prestamos['fechaFin'],$prestamos['estado']);
            //LLamar al modelo para insertar un pestamos pasandole un objeto prestamo
            PrestamosBD::insertPrestamos($prestamoA);
            echo '<script>window.location="'."index.php".'"</script>';
        }

        //metodo que modifica la fechaFin y el estado
        public static function modificarPrestamo($modi) { 
            //LLamar al modelo para modificar la fechaFin y el estado
            PrestamosBD::modificarPrestamos($modi); 
            echo '<script>window.location="'."index.php".'"</script>';
        }

        //metodo que elimina un prestamo
        public static function eliminarPrestamo($delePrestamo) { 
            //LLamar al modelo para eliminar un prestamos dado  el ide
            PrestamosBD::deletePrestamos($delePrestamo); 
            echo '<script>window.location="'."index.php".'"</script>';
        }

        //metodo que busca por estado
        public static function buscarEstado($selecEstado) { 
            //LLamar al modelo para busca los prestamos dados el estado 
            $buscados = PrestamosBD::selectPrestamosEst($selecEstado); 

            VistaPrestamosBuscados::render($buscados);
        }

        //metodo que busca por dni
        public static function buscarDni($selecDni) { 
            //LLamar al modelo para busca los prestamos dado el dni
            $buscados = PrestamosBD::selectPrestamosDni($selecDni); 

            VistaPrestamosBuscados::render($buscados);
        }
    }

?>