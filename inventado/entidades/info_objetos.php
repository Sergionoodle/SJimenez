<?php

class info_objetos
{

    private int $id;
    private string $descripcion;
    private int $precio;
    private int $puntuacion;

    /**
     * @param int $id
     * @param string $descripcion
     * @param int $precio
     * @param int $puntuacion
     */
    public function __construct(int $id, string $descripcion, int $precio, int $puntuacion)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->puntuacion = $puntuacion;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @return int
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * @return int
     */
    public function getPuntuacion(): int
    {
        return $this->puntuacion;
    }

}