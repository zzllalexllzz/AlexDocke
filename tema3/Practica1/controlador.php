<?php
session_start();
include_once("lib.php");
?>


<?php
if ($_POST) {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $cont=0;
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"];
        $cont = preg_match_all('/([A-Z]{1})/',$_SESSION['password']);
        if ($cont==1 && strlen($_SESSION['password'])>8 ) {
            echo '<script>window.location="' . "proyectos.php" . '"</script>';
        } else {
            $error="contraseña incorrecta";
            echo '<script>window.location="' . "login.php?error=".$error."" . '"</script>';
        }
    }
}

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



        array_push($_SESSION['proyectos'], ['id' => $id, 'nombre' => $nombre, 'fechaIni' => $fechaIni, 'fechaFin' => $fechaFin, 'diasTranscurridos' => $diasTranscurridos, 'porcentaje' => $porcentaje, 'prioridad' => $prioridad]);

        echo '<script>window.location="' . "proyectos.php" . '"</script>';
    }
}



if ($_GET) {
    if ($_GET['accion'] == "eliminarTodo") {

        foreach ($_SESSION['proyectos'] as $key => $value) {
            unset($_SESSION['proyectos'][$key]);
        }
        echo '<script>window.location="' . "proyectos.php" . '"</script>';
    }
}

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