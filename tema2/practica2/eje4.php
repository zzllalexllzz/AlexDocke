<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
  <div class="p-3 bg-white">

    <?php
    /*Vamos a construir un encriptador y desencriptador de mensajes. Crearemos dos
funciones:
- encriptar($mensaje,$clave)
o donde el primer argumento sea el mensaje a encriptar
o el segundo argumento sea el número de letras a desplazar a la
derecha por cada letra, por ejemplo, la b con $clave=3 se
transformará en en la f.
o La función devolverá el mensaje cifrado sustituyendo los espacios
en blanco del final y cada letra del mensaje por la correspondiente
según la clave.
- desencriptar($mensaje,$clave)
o donde el primer argumento sea el mensaje a encriptar
o el segundo argumento sea el número de letras a desplazar a la
izquierda por cada letra, por ejemplo, la f con $clave=3 se
transformará en en la b.
o La función devolverá el mensaje cifrado sustituyendo cada letra del
mensaje por la correspondiente según la clave.
Para mostrar que lo has hecho bien encripta un mensaje y muéstralo, desencríptalo y
muestra el mensaje que coincide con el original. Pista: utilizar las funciones PHP para
pasar un carácter a su correspondiente dígito ASCII y al revés.
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

    $cadena = "alexander";
    $key = 3;
    $palEnc = encriptar($cadena, $key);
    echo $palEnc;
    echo "<br>";
    echo desencriptar($palEnc, $key);

    ?>

  </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>