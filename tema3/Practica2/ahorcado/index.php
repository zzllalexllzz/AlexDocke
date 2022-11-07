<?php session_start();//iniciamos la session e incluimoos el archivo lib.php
include_once('lib.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Gemunu+Libre:wght@200&family=Noto+Sans+JP:wght@900&family=Oswald:wght@200&family=Rubik+Dirt&family=Rubik+Distressed&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
    .row {
        height: 700px;

    }
    body {
        background-image: url(./img/bg.jpg);
        color: white;
        font-family: 'Arvo', serif;
        font-family: 'Gemunu Libre', sans-serif;
        font-family: 'Noto Sans JP', sans-serif;
        font-family: 'Oswald', sans-serif;
        font-family: 'Rubik Dirt', cursive;
        font-family: 'Rubik Distressed', cursive;
    }
    #palabraA {
        font-size: 70px;
    }
    .teclado a {
        font-size: 35px;
    }
    .tam {
        font-size: 80px;
        margin-bottom: 70px;
    }
    .container{
        margin-top: 50px;
    }
    .perdiste a{
        font-size: 30px;
    }
    .ahorcado{
        margin-left: 20px;
    }
    .gana a{
        font-size: 25px;
    }
    .ganas{
        font-size: 60px;
    }
</style>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row align-items-center">
                <h1 class="text-center tam">BIENVENIDO A MI AHORCADO</h1>
                <div class="col text-center">
                    <?php
                    if (!isset($_SESSION['letras'])) {
                        $_SESSION['palabra'] = palabraRand();
                        $_SESSION['palabraActual'] = palabraAct($_SESSION['palabra']);
                        $_SESSION['letras'] = array();
                        $_SESSION['fallos'] = 0;
                    }
                    //pinta pablabra para prueba
                    //pintarPalabra($_SESSION['palabra']);
                    //echo '<br>';
                    //pinta el numero de fallos que lleva el jugador
                    echo "<h3>Fallos: " . $_SESSION['fallos'] . "</h3><br>";
                    echo "<h3>Letras dichas: ";
                    //pinta pabla para prueba
                    pintarLetras($_SESSION['letras']);
                    echo "</h3>";
                    echo "<br>";
                    echo "<h1 id='palabraA'>";
                    //pinta la palabraActual
                    pintarPalabra($_SESSION['palabraActual']);
                    echo "</h1>";
                    echo "<br>";
                    //si los fallos llegan a 6 muetrasla palabra q debia adivinar
                    if ($_SESSION['fallos'] == 6) {
                        echo "<h3>Tu palabra era:</h3>";
                        echo "<h1 class='text-info'>";
                        pintarPalabra($_SESSION['palabra']);
                        echo "</h1>";
                    }else{
                        if ($_SESSION['palabra'] == $_SESSION['palabraActual']) {
                            //quita el teclado
                        }else {
                            //pinta el teclado de letras
                            pintarTeclado();
                        }
                    }
                    ?>
                </div>
                <div class="col ahorcado">
                    <?php
                    //si la palabra es igual a la palabraActual el jugador ganara
                    if ($_SESSION['palabra'] == $_SESSION['palabraActual']) {
                        echo "<audio src='./img/victoria.wav' autoplay preload='auto'></audio>";
                        echo "<h1 class='text-center ganas text-success'>GANASTE</h1>";
                        echo "<h1 class='text-center ganas text-success'>ENHORABUENA</h1>";
                        echo "<br>";
                        echo "<br>";
                        echo "<h2 class='text-center gana'><a href='controlador.php?accion=nuevoJuego' class='btn btn-outline-light' class='text-center'>Volver a Jugar</a></h2>";
                    } else if ($_SESSION['fallos'] == 0) {
                        echo '<img src="./img/1.png" alt="">';
                    } else if ($_SESSION['fallos'] == 1) {
                        echo '<img src="./img/2.png" alt="">';
                    } else if ($_SESSION['fallos'] == 2) {
                        echo '<img src="./img/3.png" alt="">';
                    } else if ($_SESSION['fallos'] == 3) {      //el jugador tendra una animacion cada vez que cometa un fallo
                        echo '<img src="./img/4.png" alt="">';
                    } else if ($_SESSION['fallos'] == 4) {
                        echo '<img src="./img/5.png" alt="">';
                    } else if ($_SESSION['fallos'] == 5) {
                        echo '<img src="./img/6.png" alt="">';
                    } else if ($_SESSION['fallos'] == 6) {
                        echo '<img src="./img/7.png" alt="">';
                        echo "<br>";
                       
                    ?>
                </div>
                <div class="perdiste text-center"></div>
                    <?php 
                        echo "<br>";
                        echo "<div class='perdiste'>";
                    //si el jugador llega a 6 fallos el jugador pierde
                        echo"<audio src='./img/gameover.wav' autoplay preload='auto'></audio>";
                        echo "<h1 class='text-center text-danger'>PERDISTE</h1>";
                        echo "<h1 class='text-center text-danger'>SIGUE PARTICIPANDO</h1>";
                        echo "<h3 class='text-center '><a href='controlador.php?accion=nuevoJuego' class='btn btn-outline-light' class='text-center'>Volver a Jugar</a></h3>";
                        echo "</div>";
                    }
                    ?>
            </div>
        </div>
    </div>
    <script src="/bootstrap.bundle.min.js"></script>
</body>
</html>