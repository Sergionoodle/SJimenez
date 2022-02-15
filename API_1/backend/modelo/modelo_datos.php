<?php
include_once "../entidades/hoteles.php";
include_once "../entidades/datos_hoteles.php";
include_once "../bdd/bas.php";

class modelo_datos
{

    private bas $dbb;

    public function __construct()
    {
        $this->dbb = new bas();
    }

    public function hotel_dato($id){
        $sql = "SELECT * FROM hoteles WHERE id=".$id;
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $result = $query->fetch_assoc();
        $return = new hoteles($result['id'],$result['nombre_hotel'],$result['ubicacion'],$result['precio'],$result['puntuacion'],$this->get_datos($result['id_datos']));
        return $return;
    }

    public function get_datos($id_datos)
    {
        $sql = "SELECT * FROM datos_hoteles WHERE id=".$id_datos;
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $result = $query->fetch_assoc();
        $return = new datos_hoteles($result['id'],$result['imagen'],$result['video'],$result['descripcion']);
        return $return;
    }

}