<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
    <div class="p-3 bg-white">

        <?php
        /* 
Crea una cadena llamada $direccionIp y asígnale una dirección ip como
192.168.11.200. A continuación, separa en un array con cada dígito de la dirección
ip, y muestra cada dígito por separado (usa una función php). Seguidamente
reconstruye en una cadena la dirección ip, pero que en lugar de separar por puntos
los dígitos aparezcan separados por dos puntos (:) y muéstralo. */

        $direccionIp = "192.168.11.200";
        $arra1 = str_split($direccionIp);
        $cade1 = "";

        for ($i = 0; $i < count($arra1); $i++) {
            echo $arra1[$i] . "<br>";
        }
        echo "<br>";

        for ($i = 0; $i < count($arra1); $i++) {
            if ($arra1[$i] == ".") {
                $arra1[$i] = ":";
            } else {
                $arra1[$i];
            }

            $cade1 = $cade1 . $arra1[$i];
        }

        echo $cade1;

        ?>

    </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>