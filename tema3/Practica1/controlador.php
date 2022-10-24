<?php
session_start();
include_once("lib.php");
?>


<?php
//post del login.php
if ($_POST) {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];
        //metodo para asegurar que la password sea con mas de 8 caracteres y una mayuscula
        passwordSeguro($_SESSION['password']);
    }
}

//post del nuevoProyecto.php 
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

        echo '<script>window.location="' . "proyectos.php" . '"</script>';
    }
}

//get de proyectos.php elimina todos los proyectos
if ($_GET) {
    if ($_GET['accion'] == "eliminarTodo") {

        foreach ($_SESSION['proyectos'] as $key => $value) {
            unset($_SESSION['proyectos'][$key]);
        }
        echo '<script>window.location="' . "proyectos.php" . '"</script>';
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
        echo '<script>window.location="' . "proyectos.php" . '"</script>';
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
        echo '<script>window.location="' . "verProyecto.php" . '"</script>';
    }
}



?>