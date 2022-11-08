<?php 
//metodo filtrado
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
//metodo que coge un palabra aleatoria del array diccionario
function palabraRand() {
     //contiene todas la palabras que usaremos en el array
    $diccionario=["ABEJA", "ABEJORRO", "AGUILA", "ALMEJA", "ANACONDA", "ASNO", "ATUN", "AVESTRUZ", "AVISPA", "BALLENA", "BESUGO", "BUFALO", "BUHO", "BUITRE", "BURRO", "CABALLO", "CABRA", "CAIMAN", "CAMALEON", "CAMELLO", "CANARIO", "CANGREJO", "CARACOL", "CEBRA", "CERDO", "CIERVO", "CIGALA", "COBRA", "CONEJO", "COTORRA", "COYOTE", "DELFIN", "ELEFANTE", "FOCA", "GACELA", "GALLO", "GACELA", "GARZA", "GATO", "GAVILAN", "GAVIOTA", "GORILA", "GORRION", "GRILLO", "GUEPARDO", "GUSANO", "HALCON", "HAMSTER", "HIENA", "HORMIGA", "IGUANA", "JABALI", "JAGUAR", "JINETA", "JIRAFA", "KOALA", "LAGARTO", "LANGOSTA", "LECHUZA", "LEON", "LEOPARDO", "LEMUR", "LIBELULA", "LIEBRE", "LINCE", "LLAMA", "LOBO", "LOMBRIZ", "LORO", "MARIPOSA", "MARMOTA", "MARSOPA", "MEJILLON", "MONO", "MOSCA", "MULA", "NUTRIA", "ORCA", "OSO", "OSTRA", "OVEJA", "PALOMA", "PANTERA", "PATO", "PAVO", "PERDIZ", "PERRO", "PINGUINO", "PITON", "PULGA", "PULPO", "PUMA", "RANA", "RATON", "SALMON", "SAPO", "TIBURON", "TIGRE", "TOPO", "TORO", "TORTUGA", "TRUCHA", "TUCAN", "VACA", "VIBORA", "ZORRO","QUESO", "PIZZA", "CHORIZO", "JAMON", "SALAMI", "PAELLA", "PASTEL", "BIZCOCHO", "MACARRONES", "MENESTRA", "ENSALADA", "SOPA", "CHOCOLATE", "SALSA", "HUEVO", "CREMA", "LECHE", "GUARNICIÓN", "CHULETA", "FLAN", "CEVICHE", "COCIDO", "TORTILLA", "TARTA", "PURE", "ALBONDIGA", "GAZPACHO", "TORTITA", "TACO", "BOCADILLO", "TORREZNO", "FIDEUA", "CROQUETA", "SALMOREJO", "EMPANADA", "SANDWICH", "PISTO", "FABADA", "ESCALIBADA", "LENTEJAS", "CHURRO", "ENSAIMADA", "MORCILLA", "YOGUR", "TURRON", "PAPAS", "PORRUSALDA", "CALLOS", "TORRIJA", "BUTIFARRA"];
    $palabra=$diccionario[rand(0,count($diccionario))];
    $palabra=filtrado($palabra);
    return str_split($palabra);
}
//pinta e lteclado del juego
function pintarTeclado(){
    echo "<div class=teclado>
    <a class='btn btn-outline-light' href='controlador.php?letra=A'>A</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=B'>B</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=C'>C</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=D'>D</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=E'>E</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=F'>F</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=G'>G</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=H'>H</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=I'>I</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=J'>J</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=K'>K</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=L'>L</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=M'>M</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=N'>N</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=Ñ'>Ñ</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=O'>O</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=P'>P</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=Q'>Q</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=R'>R</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=S'>S</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=T'>T</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=U'>U</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=V'>V</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=W'>W</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=X'>X</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=Y'>Y</a>" . " ";
    echo "<a class='btn btn-outline-light' href='controlador.php?letra=Z'>Z</a>
    </div>";
}
//metodo que pasa la palabra y lo pasa en guiones(-) el total de deltras de la palabra
function palabraAct($cadena){
    $palabraAc='';
    for ($i=0; $i <count($cadena) ; $i++) { 
        $palabraAc.="-" ;
    }
    return str_split($palabraAc);
}
//metodo que pinta la palabra o palabraActual
function pintarPalabra($cadena){
    
    foreach ($cadena as $value) {
        echo $value." ";
    }
}
//metodo que pinta la letras usadas 
function pintarLetras($cadena){
    
    foreach ($cadena as $value) {
        echo $value.", ";
    }
}
?>