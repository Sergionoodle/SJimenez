<?php

class datos_hoteles
{

    public int $id;
    public string $imagen;
    public string $video;
    public string $descripcion;

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