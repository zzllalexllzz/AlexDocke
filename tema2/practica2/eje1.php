<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
    <div class="p-3 bg-white">

        <?php
        /*
1. Crea un array de nombres de clientes, que contengan nombre de la empresa de al
menos 5 clientes.
[“Cosentino”, “Garciden”, “Deretil”, “Makito”, “Globomatik”]
A continuación, crea una función llamada:
convierteClientes($nombres, $opcion)
donde el primer parámetro sea el array con los nombres de los clientes, y el
segundo parámetro pueden ser tres opciones:
- “L”: transforma todos los strings del array $nombres a minúsculas y lo
devuelve.
- “U”: transforma todos los strings del array $nombres a mayúsculas y lo
devuelve.
- “M”: transforma todos los strings del array $nombres de modo que la
primera letra de cada nombre de empresa sea mayúscula y el resto
minúscula. Lo devuelve.
Muestra un ejemplo de la función con cada una de las diferentes opciones.
*/

        $array1 = array("Cosentino", "Garciden", "Deretil", "Makito", "Globomatik");

        $op = "M";

        function convierteClientes($arrayNom, $opcion)
        {
            switch ($opcion) {
                case "L";
                    for ($i = 0; $i < count($arrayNom); $i++) {
                        echo strtolower($arrayNom[$i]) . " ";
                    }
                    break;
                case "U":
                    for ($i = 0; $i < count($arrayNom); $i++) {
                        echo strtoupper($arrayNom[$i]) . " ";
                    }
                    break;
                case "M":
                    for ($i = 0; $i < count($arrayNom); $i++) {
                        echo ucfirst($arrayNom[$i]) . " ";
                    }
                    break;
            }
        }

        convierteClientes($array1, $op);

        ?>

    </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>