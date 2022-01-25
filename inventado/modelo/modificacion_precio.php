<?php

include_once "../entidades/info_objetos.php";
include_once "../dbb/dbo.php";

class modificacion_precio
{
    private dbo $dbb;

    public function __construct()
    {
        $this->dbb = new dbo();
    }

    public function mod($id, $precio){
        $sql = "UPDATE info_objetos SET precio=".$precio." WHERE id=".$id;
        $this->dbb->default();
        if(!$this->dbb->query($sql)){
            echo "<script>alert('No conseguiste modificar')</script>";
        }else{
            header("Location: ../controlador/controlador_lista.php");
        }
        $this->dbb->close();
    }

}