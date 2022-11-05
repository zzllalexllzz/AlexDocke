<?php session_start();
include_once('lib.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BIENVENIDO AL AHORCADO</h1>
    <input type="button" name="jugar" value="JUGAR">
</body>
</html>
<?php
if (!isset($_SESSION['letras'])) {
    $_SESSION['palabra'] = strtoupper(palabraRand());
    echo $_SESSION['palabra']."<br>";
    $_SESSION['palabraActual'] = palabraAct($_SESSION['palabra']);
    $_SESSION['letras'] = array();
    echo "Letras dichas";
}
echo $_SESSION['palabra']."<br>";
foreach($_SESSION['letras'] as $letra) {
    echo $letra.", ";
}

    echo "<br>";
    echo "<a href='controlador.php?letra=A'>A</a>"." ";
    echo "<a href='controlador.php?letra=B'>B</a>"." ";
    echo "<a href='controlador.php?letra=C'>C</a>"." ";
    echo "<a href='controlador.php?letra=D'>D</a>"." ";
    echo "<a href='controlador.php?letra=E'>E</a>"." ";
    echo "<a href='controlador.php?letra=F'>F</a><br>";
    echo "<a href='controlador.php?letra=G'>G</a>"." ";
    echo "<a href='controlador.php?letra=H'>H</a>"." ";
    echo "<a href='controlador.php?letra=I'>I</a>"." ";
    echo "<a href='controlador.php?letra=J'>J</a>"." ";
    echo "<a href='controlador.php?letra=K'>K</a>"." ";
    echo "<a href='controlador.php?letra=L'>L</a><br>";
    echo "<a href='controlador.php?letra=M'>M</a>"." ";
    echo "<a href='controlador.php?letra=N'>N</a>"." ";
    echo "<a href='controlador.php?letra=Ñ'>Ñ</a>"." ";
    echo "<a href='controlador.php?letra=O'>O</a>"." ";
    echo "<a href='controlador.php?letra=P'>P</a>"." ";
    echo "<a href='controlador.php?letra=Q'>Q</a><br>";
    echo "<a href='controlador.php?letra=R'>R</a>"." ";
    echo "<a href='controlador.php?letra=S'>S</a>"." ";
    echo "<a href='controlador.php?letra=T'>T</a>"." ";
    echo "<a href='controlador.php?letra=U'>U</a>"." ";
    echo "<a href='controlador.php?letra=V'>V</a>"." ";
    echo "<a href='controlador.php?letra=W'>W</a><br>";
    echo "<a href='controlador.php?letra=X'>X</a>"." ";
    echo "<a href='controlador.php?letra=Y'>Y</a>"." ";
    echo "<a href='controlador.php?letra=Z'>Z</a><br>";

    echo "Tu palabra ".$_SESSION['palabraActual'];

?>