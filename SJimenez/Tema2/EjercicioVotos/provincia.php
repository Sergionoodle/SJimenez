<?php



class provincia
{

private $idProv;
private $nomProv;

    /**
     * @param $idProv
     * @param $nomProv
     */
    public function __construct($idProv, $nomProv)
    {
        $this->idProv = $idProv;
        $this->nomProv = $nomProv;
    }

    /**
     * @return mixed
     */
    public function getIdProv()
    {
        return $this->idProv;
    }

    /**
     * @param mixed $idProv
     */
    public function setIdProv($idProv)
    {
        $this->idProv = $idProv;
    }

    /**
     * @return mixed
     */
    public function getNomProv()
    {
        return $this->nomProv;
    }

    /**
     * @param mixed $nomProv
     */
    public function setNomProv($nomProv)
    {
        $this->nomProv = $nomProv;
    }


}