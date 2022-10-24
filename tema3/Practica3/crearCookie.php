<?php

//Si he pinchado en un link
if ($_GET) {

    if (isset($_COOKIE["servidor"])) {
        //Leemos lo que ya te gusta
        $gustos = $_COOKIE['servidor'];

        //Aquí desencriptas los datos
        //-----

        //Aquí habría que meter antes el contador de visitas.

        //Separar los gustos y meterlos en un array
        $gustosArray = explode("#",$gustos);

        //CreacionCookie#moda-1#deportes-2
        $encontrado = false;
        for($i=1; $i<count($gustosArray); $i++) {
            //Separa moda de 1
            
            $gustoContadorArray = explode("-",$gustosArray[$i]);

            if ($_GET['interes'] == $gustoContadorArray[0]) {
                $gustoContadorArray[1]++;
            }

            $gustosArray[$i] = implode("-", $gustoContadorArray);
        }

        //Volvemos a convertir a string ya quitados los duplicados
        $gustosString = implode("#", $gustosArray);
        
        
        //Aquí encriptas los datos 
        //-----
        setcookie('servidor',$gustosString, time()+60000, "/tema3", "localhost", false, true);
        //echo "Cookie creada";
    } else {
        setcookie('servidor',"CreacionCookie#leagueoflegends-0#overwatch-0#valorant-0#fornite-0", time()+60000, "/tema3", "localhost", false, true);
    }


    header("Location: index.php");
}


?>