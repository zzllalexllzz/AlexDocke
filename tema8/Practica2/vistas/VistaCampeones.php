<?php 
class VistaCampeones{

    public static function mostrarCampeonesAPI() {


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
                            <a href='enrutador.php?accion=mostrarDetalle&id=".$champ->id."' class='btn btn-success'>Detalles</a>
                        </div>
                    </div>
                </div>";
            }
        }
        include "./pie.php";

    }

    public static function mostrarDetalleCampeones($id) {


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
                if ($champ->id == $id) {
                    echo"
                    <div class='card mb-3 bg-warning' style='max-width: 800px;'>
                    <div class='row g-0'>
                      <div class='col-md-4'>
                        <img src='https://ddragon.leagueoflegends.com/cdn/img/champion/loading/{$champ->id}_0.jpg' class='img-fluid rounded-start' alt='...'>
                      </div>
                      <div class='col-md-8'>
                        <div class='card-body'>
                          <h1 class='card-title'>{$champ->name}</h1>
                          <h5 class='card-title'>{$champ->title}</h5>
                          <p class='card-text'>{$champ->blurb}</p>
                          <h5 class='card-title'>Estadisticas</h5>
                          <p class='card-text'>Ataque: {$champ->info->attack}</p>
                          <p class='card-text'>Defensa: {$champ->info->defense}</p>
                          <p class='card-text'>Magia: {$champ->info->magic}</p>
                          <p class='card-text'>Dificultad: {$champ->info->difficulty}</p>
                          <p class='card-text'><small class='text-muted'>{$champ->partype}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>";
                }
                
            }
        }
        //include "./pie.php";

    }
}
?>