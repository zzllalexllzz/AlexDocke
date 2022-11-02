<?php session_start(); ?>
<?php include('lib.php'); ?>
<?php


if ($_POST) {

    if (isset($_POST['empezar'])) {
        //Iniciar variables de sesión

        $_SESSION['numJugadores'] = $_POST['numeroJugadores'];
        $_SESSION['tambor'] = array();
        for($i=1; $i<100; $i++) {
            array_push($_SESSION['tambor'],$i);
        }
        header("Location: jugar.php");
    }

}
if ($_POST) {
    if (isset($_POST['jugar'])) {
        $_SESSION['jugadores']=array();
        for ($i=1; $i <= $_SESSION['numJugadores']; $i++) { 
           
            $_SESSION['numJugadores'][$i]['nombre'] = $_GET[$str];

            $jugador = array($str=>$_POST['nombre'.$i],$saldo=>$_POST['saldo'.$i]);

            array_push($_SESSION['jugadores'],$jugador);
        }
       header("Location: carton.php");
    }
}

    


?>