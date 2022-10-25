<?php
function desencriptar($mensaje, $clave){
    $res = "";
    for ($i = 0; $i < strlen($mensaje); $i++) {
      $res = $res . chr(ord($mensaje[$i]) - $clave);
    }
 
    return $res;
  } 
    echo "TE gusta: ";
    //echo $_COOKIE['servidor'];
    echo desencriptar($_COOKIE['servidor'],3); ;

?> 