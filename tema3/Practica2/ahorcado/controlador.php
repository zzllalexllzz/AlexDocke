<?php session_start();
include_once('lib.php'); 
//session_destroy()?>
<?php
$letraPulsada='';
//echo "Tu palabra ".$_SESSION['palabraActual'];
if ($_GET) {
    if (($_GET['letra'])) {
        //Comprobar que en la letra a adivinar está la letra pulsada
    $letraPulsada = $_GET['letra'];
    //echo $letraPulsada;
    array_push($_SESSION['letras'],$letraPulsada);

    for($i=0; $i < strlen($_SESSION['palabra']); $i++) {
        if ($_SESSION['palabra'][$i] == $letraPulsada) {
            //echo "Acierto, está en la palabra";
            $_SESSION['palabraActual'][$i] = $letraPulsada;
        }
    }
    header("Location: index.php");
    }
}
?>