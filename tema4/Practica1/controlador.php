<?php
session_start();//iniciamos la sesion
include_once("lib.php");//incluimos el archivo lib.php para usar los metodos
?>
<?php
//post del login.php 
//comprueba la session y coge los datos del email y el password
if ($_POST) {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];
        //metodo para asegurar que la password sea con mas de 8 caracteres y una mayuscula
        passwordSeguro($_SESSION['password']);
    }
}
//post del nuevoProyecto.php 
//añade un numevo proyecto a la session de proyectos con todos los datos requerids
if ($_POST) {
    if (isset($_POST['nuevoProyecto'])) {
        $nombre = filtrado($_POST['nombre']);
        $fechaIni = filtrado($_POST['fechaIni']);
        $fechaFin = filtrado($_POST['fechaFin']);
        $diasTranscurridos = filtrado($_POST['diasTranscurridos']);
        $porcentaje = filtrado($_POST['porcentaje']);
        $prioridad = filtrado($_POST['prioridad']);

        //Calculamos el id mayor
        if (empty($_SESSION['proyectos'])) {
            $id = 0;
        } else {
            $ids = array_column($_SESSION['proyectos'], 'id');
            $id = max($ids) + 1;
        }
        //añade el nuevo proyecto a la session de proyectos
        array_push($_SESSION['proyectos'], ['id' => $id, 'nombre' => $nombre, 'fechaIni' => $fechaIni, 'fechaFin' => $fechaFin, 'diasTranscurridos' => $diasTranscurridos, 'porcentaje' => $porcentaje, 'prioridad' => $prioridad]);
        header("Location: proyectos.php");
    }
}
//get de proyectos.php elimina todos los proyectos
if ($_GET) {
    if ($_GET['accion'] == "eliminarTodo") {

        foreach ($_SESSION['proyectos'] as $key => $value) {
            unset($_SESSION['proyectos'][$key]);
        }
        header("Location: proyectos.php");
    }
}
//get de  proyectos.php elimina un proyecto en concreto por el id
if ($_GET) {
    if ($_GET['accion'] == "eliminar") {
        foreach ($_SESSION['proyectos'] as $key => $value) {
            if ($_GET['id'] == $key) {
                unset($_SESSION['proyectos'][$key]);
            }
        }
        header("Location: proyectos.php");
    }
}
//get de proyectos.php envia a verPoryecto.php, coge un solo proyectos y lo añade a un nueva variable para llevar los datos y mostrarlo en  verPoryecto.php.
if ($_GET) {
    if ($_GET['accion'] == "info") {
        foreach ($_SESSION['proyectos'] as $key => $value) {
            if ($_GET['id'] == $key) {
                $_SESSION['pro']=$_SESSION['proyectos'][$key];
            }
        }
        header("Location: verProyecto.php");
    }
}
//get del pie.php el cerrar cession hace que borre la session actual para iniciar de nuevo desde 0 o con los proyectos por defecto.
if ($_GET) {
    if ($_GET['accion']=="nuevo") {
        session_destroy();
        header("Location: login.php");
    }
}
//get de cabecera.php donde gracias gracias al include del lib obtendremos  el metodo generarPdf que crea el documento proyectos pdf y los envia al email dentro de la session.
if ($_GET) {
    if ($_GET['accion']=="crearEnviarPdf") {
        generarPdf($_SESSION['proyectos']);
        enviarPdf($_SESSION['email']);
        echo'<script>window.location="'."proyectos.php".'"</script>';
    }
}
?>