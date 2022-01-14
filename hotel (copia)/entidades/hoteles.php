<?php

//Incluimos la clase de datos hoteles
include_once "datos_hoteles.php";

class hoteles
{

    //Creamos las variables tipicas
    private int $id;
    private string $nombre_hotel;
    private string $ubicacion;
    private int $precio;
    private int $puntuacion;

    //Creamos una variable de tipo datos_hoteles que es su id
    private datos_hoteles $id_datos;

    //Generamos su constructor
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

    //Generamos sus getters
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