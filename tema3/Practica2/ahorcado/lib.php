<?php 
//metodo que coge un palabra aleatoria del array diccionario
function palabraRand() {
     //contiene todas la palabras que usaremos en el array
    $diccionario=['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];
    $palabra=$diccionario[rand(0,6)];
    return $palabra;
}
?>