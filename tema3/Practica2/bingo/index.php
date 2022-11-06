<?php session_start(); ?>
<?php include('lib.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

    <div class='container'>

        <h2>BIENVENIDO AL BINGO PHP</h2>

       

        <?php
            if (!isset($_GET['accion'])) {
        ?>
    
        <div class='row'>

            <div class='col-3'>
                <form action="controlador.php" method='post'>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Número jugadores</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name='numeroJugadores' min='1' max='5'>
                    </div>
                    <button type="submit" name='generarJugadores' class="btn btn-primary">Enviar</button>

                </form>
            </div>

        </div>

        <?php
            } else {

                pintarTambor();

                for($i=0; $i<$_SESSION['numJugadores'];$i++) {
                    echo "<br>";
                    echo "<h1>Nick: ".$_SESSION['jugador'.$i][0]."</h1>";
                    echo "<h3>Saldo: ".$_SESSION['jugador'.$i][1]."</h3>";
                    pintarCarton($_SESSION['carton'.$i]);
                }

                //Botón sacar número del tambor
                echo "<br>";
                echo "<form action='controlador.php' method='post'>";
                echo "<button type='submit' name='sacarBola' class='btn btn-primary'>Sacar bola</button>";
                echo "</form>";

            }
        ?>
       

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>