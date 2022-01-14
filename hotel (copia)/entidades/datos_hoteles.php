<?php

class datos_hoteles
{

    //Creamos las tipicas variables que usaremos
    private int $id;
    private string $imagen;
    private string $video;
    private string $descripcion;

    //Generamos su constructor
    /**
     * @param int $id
     * @param string $imagen
     * @param string $video
     * @param string $descripcion
     */
    public function __construct(int $id, string $imagen, string $video, string $descripcion)
    {
        $this->id = $id;
        $this->imagen = $imagen;
        $this->video = $video;
        $this->descripcion = $descripcion;
    }

    //Generamos sus Getters
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
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @return string
     */
    public function getVideo(): string
    {
        return $this->video;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

}