<?php

include_once "../entidades/info_objetos.php";
include_once "../entidades/objetos.php";
include_once "../dbb/dbo.php";

class modelo_lista
{

    private dbo $dbb;

    public function __construct()
    {
        $this->dbb = new dbo();
    }

    //Funcion para sacar la lista de objetos
    public function objeto_list(){
        $sql = "SELECT * FROM objetos";
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new objetos($resultado['id'],$resultado['nombre'],$this->get_info($resultado['id_informacion']));
        }
        return $return;
    }

    public function get_info($id_informacion)
    {
        $sql = "SELECT * FROM info_objetos WHERE id=".$id_informacion;
        $this->dbb->default();
        $query = $this->dbb->query($sql);
        $this->dbb->close();
        $resultado = $query->fetch_assoc();
        $return = new info_objetos($resultado['id'],$resultado['descripcion'],$resultado['precio'],$resultado['puntuacion']);
        return $return;
    }

}