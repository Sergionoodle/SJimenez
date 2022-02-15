<?php
include_once "../bdd/bas.php";
include_once "../entidades/hoteles.php";
include_once "../entidades/datos_hoteles.php";
class modelo_update
{

    private bas $dbb;

    public function __construct()
    {
        $this->dbb = new bas();
    }

    public function mod_precio($id,$precio){
        $sql = "UPDATE `hoteles` SET `precio`=".$precio." WHERE id=".$id.";";
        $this->dbb->default();
        $this->dbb->query($sql);
        $this->dbb->close();
    }
}