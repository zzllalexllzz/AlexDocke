<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
  <div class="p-3 bg-white">

    <?php
    /* Mejora el programa anterior de tal manera que el mensaje original lo divida primero
en un array de palabras considerando el espacio en blanco como separador
únicamente. 
A continuación, debe poner cada palabra del revés (hola ->aloh).
Seguidamente encriptará cada palabra usando la función del ejercicio anterior.
Finalmente devolverá un string con cada palabra encriptada añadiendo un espacio
en blanco entre cada palabra. 
El desencriptador hará lo contrario (y no digo más).
Muestra el programa funcionando encriptando y desencriptando.
*/
    function encriptar($mensaje, $clave)
    {
      $res = "";
      for ($i = 0; $i < strlen($mensaje); $i++) {
        $res = $res . chr(ord($mensaje[$i]) + $clave);
      }
      return $res;
    }

    function desencriptar($mensaje, $clave)
    {
      $res = "";
      for ($i = 0; $i < strlen($mensaje); $i++) {
        $res = $res . chr(ord($mensaje[$i]) - $clave);
      }
      return $res;
    }
    //mejorados
    function encriptarMe($mensaje, $clave)
    {
      $arrayCad = explode(" ", ($mensaje));
      $arrev = array_reverse($arrayCad);
      $cadrev = implode(" ", $arrev);
      $encry = encriptar($cadrev, $clave);
      return $encry;
    }

    function desencriptarMe($mensaje, $clave)
    {
      $desEncry = desencriptar($mensaje, $clave);
      $arrayCad = explode(" ", ($desEncry));
      $arrev = array_reverse($arrayCad);
      $cadrev = implode(" ", $arrev);
      return $cadrev;
    }

    $cadena = "h o l a";
    echo encriptarMe($cadena, 3);
    echo "<br>";
    echo desencriptarMe(encriptarMe($cadena, 3), 3);
    ?>

  </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>