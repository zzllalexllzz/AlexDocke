<?php session_start(); ?>
<?php include('lib.php'); ?>
<?php
    echo "<div class='container'>
    <h2>BIENVENIDO AL BINGO</h2>
    <div class='row'>";             
    echo "<form action='controlador.php' method='post'>";
    for ($i=1; $i <=$_SESSION['numJugadores'] ; $i++) { 
        
        echo"<div class='mb-3'>
        <label for='exampleInputPassword1' class='form-label'>Nombre".$i."</label>
            <input type='text' class='form-control' id='exampleInputPassword1' name='nombre".$i."' >
            <label for='exampleInputPassword1' class='form-label'>Saldo".$i."</label>
            <input type='number' class='form-control' id='exampleInputPassword1' name='saldo".$i."' min='10' max='100'>
        </div>";
    }
    echo "<button type='submit' name='jugar' class='btn btn-primary'>JUGAR</button>
    </form>
    </div>
    </div>";
           
?>