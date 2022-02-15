<?php
include_once "datos_hoteles.php";
class hoteles
{
    public int $id;
    public string $nombre_hotel;
    public string $ubicacion;
    public int $precio;
    public int $puntuacion;
    public datos_hoteles $id_datos;

    /**
     * @param int $id
     * @param string $nombre_hotel
     * @param string $ubicacion
     * @param int $precio
     * @param int $puntuacion
     * @param datos_hoteles $id_datos
     */
    public function __construct(int $id, string $nombre_hotel, string $ubicacion, int $precio, int $puntuacion, datos_hoteles $id_datos)
    {
        $this->id = $id;
        $this->nombre_hotel = $nombre_hotel;
        $this->ubicacion = $ubicacion;
        $this->precio = $precio;
        $this->puntuacion = $puntuacion;
        $this->id_datos = $id_datos;
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
    public function getNombreHotel(): string
    {
        return $this->nombre_hotel;
    }

    /**
     * @return string
     */
    public function getUbicacion(): string
    {
        return $this->ubicacion;
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

    /**
     * @return datos_hoteles
     */
    public function getIdDatos(): datos_hoteles
    {
        return $this->id_datos;
    }



}