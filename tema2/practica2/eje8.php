<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<div class="col-md-10 themed-grid-col" >
    <div class="p-1"  style="background:url(./img8/bg.jpg);">

        <?php
        $lolPersonajes = array(
            array("id" => 1, "titulo" => "LA VENGANZA ARDIENTE", "nombre" => "BRAND", "descripcion" => "Brand, antiguo miembro de la tribu Kegan Rodhe del helado Freljord, es una lección sobre la tentación de un poder mayor. En busca de una de las legendarias Runas Geogénicas, Kegan traicionó a sus compañeros y se quedó con la runa. El hombre desapareció... ", "foto" => "./img8/brand.jpg", "imagenes" => array("habq" => "./img8/brand/BrandQ.png", "habw" => "./img8/brand/BrandW.png", "habe" => "./img8/brand/BrandE.png", "habr" => "./img8/brand/BrandR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0063/ability_0063_R1.webm"),
            array("id" => 1, "titulo" => "EL CORAZÓN DE FRELJORD", "nombre" => "BRAUM", "descripcion" => "Bendecido con bíceps enormes y un corazón aún más grande, Braum es un héroe muy apreciado en Freljord. Todas las tabernas al norte del Fuerte Helado brindan por su fuerza legendaria. Se dice que taló un bosque de robles en una sola noche y convirtió una...", "foto" => "./img8/braum.jpg", "imagenes" => array("habq" => "./img8/braum/BraumQ.png", "habw" => "./img8/braum/BraumW.png", "habe" => "./img8/braum/BraumE.png", "habr" => "./img8/braum/BraumR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0201/ability_0201_R1.webm"),
            array("id" => 1, "titulo" => "EL DESDÉN DE LA LUNA", "nombre" => "DIANA", "descripcion" => "Portadora de una espada en forma de media luna, Diana es una guerrera de los Lunari, una fe rechazada en casi todas las tierras a los pies del Monte Targon. Ataviada con una armadura reluciente del color de la nieve en una noche de invierno, es la... ", "foto" => "./img8/diana.jpg", "imagenes" => array("habq" => "./img8/diana/DianaQ.png", "habw" => "./img8/diana/DianaW.png", "habe" => "./img8/diana/DianaE.png", "habr" => "./img8/diana/DianaR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0131/ability_0131_R1.webm"),
            array("id" => 1, "titulo" => "EL CHICO QUE QUEBRÓ EL TIEMPO", "nombre" => "EKKO", "descripcion" => "Ekko, un prodigio surgido de las implacables calles de Zaun, manipula el tiempo para sacar ventaja de todas las situaciones. Con una máquina de su invención llamada Dispositivo Z, explora las distintas posibilidades de la realidad hasta alcanzar el...", "foto" => "./img8/ekko.jpg", "imagenes" => array("habq" => "./img8/ekko/EkkoQ.png", "habw" => "./img8/ekko/EkkoW.png", "habe" => "./img8/ekko/EkkoE.png", "habr" => "./img8/ekko/EkkoR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0245/ability_0245_R1.webm"),
            array("id" => 1, "titulo" => "EL GAMBERRO DE LAS MAREAS", "nombre" => "FIZZ", "descripcion" => "Fizz es un yordle anfibio que habita entre los arrecifes de alrededor de Aguas Estancadas. Suele recuperar y devolver los diezmos arrojados al mar por capitanes supersticiosos, pero incluso los marineros más agudos saben que no hay que plantarle cara...", "foto" => "./img8/fizz.jpg", "imagenes" => array("habq" => "./img8/fizz/FizzQ.png", "habw" => "./img8/fizz/FizzW.png", "habe" => "./img8/fizz/FizzE.png", "habr" => "./img8/fizz/FizzR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0105/ability_0105_R1.webm"),
            array("id" => 1, "titulo" => "EL PEQUEÑO MAESTRO DEL MAL", "nombre" => "VEIGAR", "descripcion" => "Entusiasta maestro de la magia negra, Veigar ha hecho suyos poderes a los que pocos mortales se atreven a acercarse. Como espíritu de Ciudad de Bandle, buscó durante mucho tiempo deshacerse de las limitaciones de la magia yordle, así que su atención se...", "foto" => "./img8/veigar.jpg", "imagenes" => array("habq" => "./img8/veigar/VeigarQ.png", "habw" => "./img8/veigar/VeigarW.png", "habe" => "./img8/veigar/VeigarE.png", "habr" => "./img8/veigar/VeigarR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0045/ability_0045_R1.webm"),
            array("id" => 1, "titulo" => "EL OJO DEL VACÍO", "nombre" => "VEL'KOZ", "descripcion" => "No es seguro que Vel'Koz sea el primer ente del Vacío que ha aparecido en Runaterra, pero no ha habido ningún otro con su nivel de crueldad y conciencia calculadora. Mientras que los de su especie devoran y profanan todo cuanto encuentran, él busca el...", "foto" => "./img8/velkoz.jpg", "imagenes" => array("habq" => "./img8/velkoz/VelkozQ.png", "habw" => "./img8/velkoz/VelkozW.png", "habe" => "./img8/velkoz/VelkozE.png", "habr" => "./img8/velkoz/VelkozR.png"), "bg" => "./img8/bg.jpg", "video"=>"https://d28xe8vt774jo5.cloudfront.net/champion-abilities/0161/ability_0161_R1.webm")

        );


        echo "<div class='container'>";
        echo "<div class='row g-5'>";
        echo "<img src='./img8/juego.png' alt='' style='width:60%; height:400px; margin-left:20%;'>";
        foreach ($lolPersonajes as $value) {
            echo "<div class='card mb-3' style='width: 90%; height:625px; background:url(" . $value["bg"] . ");'>
            <div class='row g-2'>
              <div class='col-md-4'>
                <img  src='" . $value["foto"] . "' style='width: 100%; height:75%; margin-top:70px' alt='Responsive image'>
              </div>
              <div class='col-md-8'>
                <div class='card-body'>
                  <h3  class='text-warning'>" . $value["titulo"] . "</h3>
                  <h1 class='text-warning'>" . $value["nombre"] . "</h1>
                  <p class='text-light'>" . $value["descripcion"] . "</p>
                  
                    <div class='container text-center'>
                        <video autoplay loop preload muted height='300' style='text-align:center';>
                        <source src='".$value["video"]."' type='video/webm' />
                        </video>
                    </div>";
                    echo "<table class='table  black-500' style='border:none;'>";
                    echo "<tr>";
                    foreach($value['imagenes'] as $img) {
                        echo "<td>";
                        echo "<img  src='".$img."' alt=''>";
                        echo "</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
               echo" </div>
              </div>
            </div>
          </div>";
        }
        echo "</div>";
        echo "</div>";

        ?>


    </div>
</div>
</div>

<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/pie.php");
?>