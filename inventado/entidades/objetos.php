<?php

include_once "../entidades/info_objetos.php";
class objetos
{

    private int $id;
    private string $nombre;
    private info_objetos $id_informacion;

    /**
     * @param int $id
     * @param string $nombre
     * @param info_objetos $id_informacion
     */
    public function __construct(int $id, string $nombre, info_objetos $id_informacion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_informacion = $id_informacion;
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
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return info_objetos
     */
    public function getIdInformacion(): info_objetos
    {
        return $this->id_informacion;
    }

}