<?php 
//metodo que coge un palabra aleatoria del array diccionario
function palabraRand() {
     //contiene todas la palabras que usaremos en el array
    $diccionario=["ABEJA", "ABEJORRO", "AGUILA", "ALMEJA", "ANACONDA", "ARAÑA", "ASNO", "ATUN", "AVESTRUZ", "AVISPA", "BALLENA", "BESUGO", "BUFALO", "BUHO", "BUITRE", "BURRO", "CABALLO", "CABRA", "CAIMAN", "CAMALEON", "CAMELLO", "CANARIO", "CANGREJO", "CARACOL", "CEBRA", "CERDO", "CIERVO", "CIGALA", "COBRA", "CONEJO", "COTORRA", "COYOTE", "DELFIN", "ELEFANTE", "FOCA", "GACELA", "GALLO", "GACELA", "GARZA", "GATO", "GAVILAN", "GAVIOTA", "GORILA", "GORRION", "GRILLO", "GUEPARDO", "GUSANO", "HALCON", "HAMSTER", "HIENA", "HORMIGA", "IGUANA", "JABALI", "JAGUAR", "JINETA", "JIRAFA", "KOALA", "LAGARTO", "LANGOSTA", "LECHUZA", "LEON", "LEOPARDO", "LEMUR", "LIBELULA", "LIEBRE", "LINCE", "LLAMA", "LOBO", "LOMBRIZ", "LORO", "MARIPOSA", "MARMOTA", "MARSOPA", "MEJILLON", "MONO", "MOSCA", "MULA", "NUTRIA", "ORCA", "OSO", "OSTRA", "OVEJA", "PALOMA", "PANTERA", "PATO", "PAVO", "PERDIZ", "PERRO", "PINGUINO", "PITON", "PULGA", "PULPO", "PUMA", "RANA", "RATON", "SALMON", "SAPO", "TIBURON", "TIGRE", "TOPO", "TORO", "TORTUGA", "TRUCHA", "TUCAN", "VACA", "VIBORA", "ZORRO"];
    $palabra=$diccionario[rand(0,6)];
    $palabra=strtoupper($palabra);
    return str_split($palabra);
}
//metodo que pasa la palabra y lo pasa en guones(-) el total de deltras de la palabra
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