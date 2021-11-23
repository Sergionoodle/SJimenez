<?php

class pedido
{

    private $CodigoProducto;
    private $Nombre;
    private $Gama;
    private $Dimensiones;
    private $Descripcion;

    /**
     * @param $CodigoProducto
     * @param $Nombre
     * @param $Gama
     * @param $Dimensiones
     * @param $Descripcion
     */
    public function __construct($CodigoProducto, $Nombre, $Gama, $Dimensiones, $Descripcion)
    {
        $this->CodigoProducto = $CodigoProducto;
        $this->Nombre = $Nombre;
        $this->Gama = $Gama;
        $this->Dimensiones = $Dimensiones;
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return mixed
     */
    public function getCodigoProducto()
    {
        return $this->CodigoProducto;
    }

    /**
     * @param mixed $CodigoProducto
     */
    public function setCodigoProducto($CodigoProducto)
    {
        $this->CodigoProducto = $CodigoProducto;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getGama()
    {
        return $this->Gama;
    }

    /**
     * @param mixed $Gama
     */
    public function setGama($Gama)
    {
        $this->Gama = $Gama;
    }

    /**
     * @return mixed
     */
    public function getDimensiones()
    {
        return $this->Dimensiones;
    }

    /**
     * @param mixed $Dimensiones
     */
    public function setDimensiones($Dimensiones)
    {
        $this->Dimensiones = $Dimensiones;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }


}