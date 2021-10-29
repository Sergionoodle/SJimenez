<?php

class partidos
{
    private $id;
    private $nombre;
    private $acronimo;
    private $logo;

    /**
     * @param $id
     * @param $nombre
     * @param $acronimo
     * @param $logo
     */
    public function __construct($id, $nombre, $acronimo, $logo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->acronimo = $acronimo;
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getAcronimo()
    {
        return $this->acronimo;
    }

    /**
     * @param mixed $acronimo
     */
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }


}