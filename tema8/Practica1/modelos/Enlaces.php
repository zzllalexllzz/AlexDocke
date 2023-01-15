<?php
class Enlaces{

    private $id;
    private $idRegalo;
    private $nombre;
    private $web;
    private $precio;
    private $imagen;
    private $prioridad;

    public function __construct($id="",$idRegalo="",$nombre="",$web="",$precio="",$imagen="",$prioridad=""){
        $this->id = $id;
        $this->idRegalo = $idRegalo;
        $this->nombre = $nombre;
        $this->web = $web;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->prioridad = $prioridad;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idRegalo
     */ 
    public function getIdRegalo()
    {
        return $this->idRegalo;
    }

    /**
     * Set the value of idRegalo
     *
     * @return  self
     */ 
    public function setIdRegalo($idRegalo)
    {
        $this->idRegalo = $idRegalo;

        return $this;
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

    /**
     * Get the value of web
     */ 
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set the value of web
     *
     * @return  self
     */ 
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get the value of prioridad
     */ 
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set the value of prioridad
     *
     * @return  self
     */ 
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
}
?>