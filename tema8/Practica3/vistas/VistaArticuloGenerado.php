<?php
class VistaArticuloGenerado {

    public static function render($texto){
        require_once('vendor/autoload.php');
        $client = new \GuzzleHttp\Client();

        //Vendría del textarea
        $textoArticulo = "Escribe un artículo sobre " . $texto;

        $response = $client->request('POST', 'https://api.openai.com/v1/completions', [
        'body' => '{"model": "text-davinci-003", "prompt": "'.$textoArticulo.'", "temperature": 0, "max_tokens": 1000, "n": 1}',
        'headers' => [
            'Authorization' => 'Bearer ',
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);

        $respuesta = $response->getBody();

        $respuestaJSON = json_decode($respuesta);

        $textoArticulo = $respuestaJSON->choices[0]->text;

        $textoImagen = $texto;
        $response = $client->request('POST', 'https://api.openai.com/v1/images/generations', [
        'body' => '{"prompt": "'.$textoImagen.'", "size": "1024x1024", "n": 1}',
        'headers' => [
            'Authorization' => 'Bearer ',
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);

        $respuesta = $response->getBody();

        $respuestaJSON = json_decode($respuesta);

        $imagenArticulo = $respuestaJSON->data[0]->url;

        include "./cabecera.php";

            echo'<center>
            <div class="card mb-3 mt-5" ">
                <div class="row g-0">
                    <div class="col-6">
                        <img src="'.$imagenArticulo.'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                        <h2 class="card-title">'.$texto.'</h2>
                        <p class="card-text">'.$textoArticulo.'</p>
                        </div>
                    </div>
                </div>
            </div>

           </center>';

            echo "
            <center mt-5>
            <div class='mt-5 mb-5'>
            <a href='enrutador.php?accion=guardarArticulo&titulo=".$texto."&texto=".$textoArticulo."&imagen=".urlencode($imagenArticulo)."' class='btn btn-outline-success'>Guardar Articulo</a>
            <a href='enrutador.php?accion=mostrarForm' class='btn btn-outline-success'>Volver a Generar</a>
            </div>

            </center>
            ";

        include "./pie.php";

    //     echo"<center>
    //     <div class='card mb-3 ' style='width: 900px; heigth:400px; '>
    //         <img src='".$imagenArticulo."' class='img-fluid ' >
    //         <div class='card-body'>
    //           <h5 class='card-title h4'>".$texto."</h5>
    //           <p class='card-text'>".$textoArticulo."</p>
    //         </div>
    //       </div>

    //    </center>";
    }
}

?>