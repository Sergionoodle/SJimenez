<?php

include_once "../entidades/datos_hoteles.php";
include_once "../entidades/hoteles.php";
include_once "../bdd/bas.php";
class model_principal
{

    private bas $dbb;

    public function __construct()
    {
        $this->dbb = new bas();
    }

    public function listado_hoteles(){
        $sql = "SELECT * FROM hoteles";
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new hoteles($resultado['id'],$resultado['nombre_hotel'],$resultado['ubicacion'],$resultado['precio'],$resultado['puntuacion'],$this->datos_hotel($resultado['id_datos']));
        }
        return $return;
    }

    public function datos_hotel($id_datos)
    {
        $sql = "SELECT * FROM datos_hoteles WHERE id=".$id_datos;
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $result = $query->fetch_assoc();
        $return = new datos_hoteles($result['id'],$result['imagen'],$result['video'],$result['descripcion']);
        return $return;
    }

    public function listado_hoteles_nombre(){
        $sql = "SELECT * FROM hoteles ORDER BY nombre_hotel";
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new hoteles($resultado['id'],$resultado['nombre_hotel'],$resultado['ubicacion'],$resultado['precio'],$resultado['puntuacion'],$this->datos_hotel($resultado['id_datos']));
        }
        return $return;
    }
    public function listado_hoteles_precio(){
        $sql = "SELECT * FROM hoteles ORDER BY precio";
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new hoteles($resultado['id'],$resultado['nombre_hotel'],$resultado['ubicacion'],$resultado['precio'],$resultado['puntuacion'],$this->datos_hotel($resultado['id_datos']));
        }
        return $return;
    }
}