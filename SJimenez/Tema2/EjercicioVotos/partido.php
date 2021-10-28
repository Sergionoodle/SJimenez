<?php

class partido
{

    private $provName;
    private $nombrePartido;
    private $votosPartido;

    /**
     * @param $provID
     * @param $nombrePartido
     * @param $votosPartido
     */
    public function __construct($provID, $nombrePartido, $votosPartido)
    {
        $this->provName = $provID;
        $this->nombrePartido = $nombrePartido;
        $this->votosPartido = $votosPartido;
    }

    /**
     * @return mixed
     */
    public function getProvName()
    {
        return $this->provName;
    }

    /**
     * @param mixed $provName
     */
    public function setProvName($provName)
    {
        $this->provName = $provName;
    }

    /**
     * @return mixed
     */
    public function getNombrePartido()
    {
        return $this->nombrePartido;
    }

    /**
     * @param mixed $nombrePartido
     */
    public function setNombrePartido($nombrePartido)
    {
        $this->nombrePartido = $nombrePartido;
    }

    /**
     * @return mixed
     */
    public function getVotosPartido()
    {
        return $this->votosPartido;
    }

    /**
     * @param mixed $votosPartido
     */
    public function setVotosPartido($votosPartido)
    {
        $this->votosPartido = $votosPartido;
    }

}