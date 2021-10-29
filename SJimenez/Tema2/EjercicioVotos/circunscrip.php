<?php

class circunscrip
{

    private $distrito;
    private $partido;
    private $votos;

    /**
     * @param $distrito
     * @param $partido
     * @param $votos
     */
    public function __construct($distrito, $partido, $votos)
    {
        $this->distrito = $distrito;
        $this->partido = $partido;
        $this->votos = $votos;
    }

    /**
     * @return mixed
     */
    public function getDistrito()
    {
        return $this->distrito;
    }

    /**
     * @param mixed $distrito
     */
    public function setDistrito($distrito)
    {
        $this->distrito = $distrito;
    }

    /**
     * @return mixed
     */
    public function getPartido()
    {
        return $this->partido;
    }

    /**
     * @param mixed $partido
     */
    public function setPartido($partido)
    {
        $this->partido = $partido;
    }

    /**
     * @return mixed
     */
    public function getVotos()
    {
        return $this->votos;
    }

    /**
     * @param mixed $votos
     */
    public function setVotos($votos)
    {
        $this->votos = $votos;
    }


}