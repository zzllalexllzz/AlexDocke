
<?php
include "./cabecera.php";

//$uri = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($_GET['titulo']);
$uri = "http://ddragon.leagueoflegends.com/cdn/13.1.1/data/es_ES/champion.json";
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token: ';
$stream_context = stream_context_create($reqPrefs);
$resultado = file_get_contents($uri, false, $stream_context);

//Pasar de json a objeto php y recorrer los resultados
if ($resultado != false) {
    $respPHP = json_decode($resultado);

    foreach($respPHP->data as $champ) {
        echo"
        <div class='col-lg-2 d-flex justify-content-center mt-2 mb-2'>
            <div class='card bg-dark' style='width: 15rem;'>
                <img src='https://ddragon.leagueoflegends.com/cdn/img/champion/loading/{$champ->id}_0.jpg' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title text-warning'>{$champ->name}</h5>
                    <p class='card-text text-secondary'>{$champ->title}</p>
                </div>
            </div>
        </div>";
    }
}
include "./pie.php";


?>
