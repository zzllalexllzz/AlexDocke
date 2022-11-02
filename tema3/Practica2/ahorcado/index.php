<?php session_start();
include_once('lib.php');?>
<?php
if (!isset($_SESSION['letras'])) {
    $_SESSION['palabra'] = palabraRand();
    echo $_SESSION['palabra']."<br>";
    $_SESSION['palabraActual'] = "---a";
    $_SESSION['letras'] = [];
    echo "Letras dichas ";
    
}
echo $_SESSION['palabra']."<br>";
foreach($_SESSION['letras'] as $letra) {
    echo $letra.", ";
}

    

    echo "<br>";
    echo "<a href='controlador.php?letra=b'>B</a><br>";
    echo "<a href='controlador.php?letra=e'>E</a><br>";
    echo "<a href='controlador.php?letra=o'>O</a><br>";
    echo "<a href='controlador.php?letra=h'>H</a><br>";
    echo "<a href='controlador.php?letra=l'>L</a><br>";
    echo "<a href='controlador.php?letra=a'>A</a><br>";
    echo "<a href='controlador.php?letra=a'>A</a><br>";
    echo "<a href='controlador.php?letra=a'>A</a><br>";
    echo "<a href='controlador.php?letra=a'>A</a><br>";

    echo "Tu palabra ".$_SESSION['palabraActual'];

?>