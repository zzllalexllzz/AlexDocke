<?php

include("Truco.php");


class Juego
{

    private $nombre, $genero, $plataforma;
    private $trucos;

    public function __construct($nombre = "Sin nombre", $genero = "Rol", $plataforma = "PC")
    {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->plataforma = $plataforma;
        $this->trucos = array();
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getPlataforma()
    {
        return $this->plataforma;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function setPlataforma($plataforma)
    {
        $this->plataforma = $plataforma;
    }

    public function pintar()
    {
        echo "<h3>" . $this->nombre . "</h3>";
        echo "<h5>Genero: " . $this->genero . "</h5>";
        echo "<h5>Plataforma: " . $this->plataforma . "</h5>";
        foreach ($this->trucos as $truco) {
            $truco->pintar();
        }
    }

    public function addTruco($unTruco)
    {
        array_push($this->trucos, $unTruco);
    }

    public function deleteTruco($unTruco)
    {
        foreach ($this->trucos as $clave => &$truco) {
            if ($truco == $unTruco) {
                unset($this->trucos[$clave]);
            }
        }

        //Para que no haya posiciones vacías - opcional en este ejemplo
        $this->trucos = array_values($this->trucos);
    }
}

$truco1 = new Truco("Truco1", "Descripción1");
$truco2 = new Truco("Truco2", "Descripción2");

$juego = new Juego(nombre: "Fifa23", plataforma: "PC");
$juego->addTruco($truco1);
$juego->addTruco($truco2);
$juego->pintar();
$juego->deleteTruco($truco1);
$juego->pintar();
