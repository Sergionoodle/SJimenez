<?php

class detalles
{

    private  $CodigoProducto;
    private $Nombre;
    private $Cantidad;

    /**
     * @param $CodigoProducto
     * @param $Nombre
     * @param $Cantidad
     */
    public function __construct($CodigoProducto, $Nombre, $Cantidad)
    {
        $this->CodigoProducto = $CodigoProducto;
        $this->Nombre = $Nombre;
        $this->Cantidad = $Cantidad;
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
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * @param mixed $Cantidad
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }



}