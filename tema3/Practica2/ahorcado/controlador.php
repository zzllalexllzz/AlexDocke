<?php session_start();
include_once('lib.php'); //iniciamos la session e incluimoos el archivo lib.php
?>
<?php
$letraPulsada='';

if ($_GET) {
    if (isset($_GET['letra'])) {
        //Comprobar que en la letra a adivinar está la letra pulsada
        $letraPulsada = $_GET['letra'];
        if (in_array($letraPulsada, $_SESSION['palabra'])) {//comprueba si la letra esta en el array  de la session palabra
            for($i=0; $i < count($_SESSION['palabra']); $i++) {
                if ($_SESSION['palabra'][$i] == $letraPulsada) {
                    $_SESSION['palabraActual'][$i] = $letraPulsada;//intercambia la por la letra en la misna posicion que se encuetra en la palabra
                }  
            }
        }else{
            //si los fallos llegan a 6 el contador hace un stop y ya no cuenta nada
            if ($_SESSION['fallos']!=6) {
                //cuenta los las letra que no estan en el la session palabra
                $_SESSION['fallos']++;
                //añade las letas usadas segun los fallos 
                array_push($_SESSION['letras'],$letraPulsada);
            } 
        }
    header("Location: index.php");
    }
}
if ($_GET) {//al perder  o gana da la oportunidad de volver a iniciar el juego 
    if (($_GET['accion'])) {
        if ($_GET['accion']=='nuevoJuego') {
            session_destroy();//
            header("Location: index.php");
        }
    }
}
?>