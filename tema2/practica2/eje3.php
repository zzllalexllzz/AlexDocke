<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col">
    <div class="p-3 bg-white">

        <?php
        /*Crear un array llamado $word_list_en con 50 palabras en inglés. Crea otro array
llamado $word_list_es con las mismas 50 palabras en el mismo orden, pero en
español. El ejercicio consiste en hacer un traductor literal de español a inglés o
viceversa, debe recorrer una cadena de texto y devolverla en el idioma traduciendo
una por una las palabras (se supone que están en la misma posición en los
arrays).*/

        $word_list_en = array(
            "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
            "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen", "twenty", "twenty-one", "twenty-two", "twenty-three", "twenty-four", "twenty-five", "twenty-six", "twenty-seven", "twenty-eight", "twenty-nine", "thirty", "thirty-one", "thirty-two", "thirty-three", "thirty-four", "thirty-five", "thirty-six", "thirty-seven", "thirty-eight", "thirty-nine", "forty", "forty-one", "forty-two", "forty-three", "forty-four", "forty-five", "forty-six", "forty-seven", "forty-eight", "forty-nine", "fifty"
        );
        $word_list_es = array(
            "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve", "veinte", "veintiuno", "veintidos", "veintitres", "veinticuatro", "veinticinco", "veintiseis", "veintisiete", "veintiocho", "veintinueve", "treinta", "treinta y uno", "treinta y dos", "treinta y tres", "treinta y cuatro", "treinta y cinco", "treinta y seis", "treinta y siete", "treinta y ocho", "treinta y nueve", "cuarenta", "cuarenta y uno", "cuarenta y dos", "cuarenta y tres", "cuarenta y cuatro", "cuarenta y cinco", "cuarenta y seis", "cuarenta y siete", "cuarenta y ocho", "cuarenta y nueve", "cincuenta"
        );

        $cadena = "six";

        for ($i = 0; $i < count($word_list_es); $i++) {
            if ($cadena == $word_list_es[$i]) {
                $cadEnEs = $word_list_en[$i];
            } else {
                for ($j = 0; $j < count($word_list_en); $j++) {
                    if ($cadena == $word_list_en[$j]) {
                        $cadEnEs = $word_list_es[$j];
                    }
                }
            }
        }

        echo $cadEnEs;
        ?>

    </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>