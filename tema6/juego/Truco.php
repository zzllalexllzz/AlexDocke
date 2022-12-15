<?php 
class Truco{

    private $nombre;
    private $descripcion;

    function __construct($nombre, $descripcion){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        return $this->descripcion=$descripcion;
    }

    function toString(){
        echo $this-> nombre." - ".$this->descripcion;
    }


    


    
}


?>