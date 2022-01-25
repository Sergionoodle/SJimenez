<?php

include_once "../entidades/usuarios.php";
include_once "../dbb/dbo.php";

class modelo_usuario_login
{

    private dbo $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }

    public function select_usuarios($mail){
        $sql = "SELECT * FROM usuarios WHERE mail='".$mail."';";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        $resultado = $query->fetch_assoc();
        $return = new usuarios($resultado['id'],$resultado['mail'],$resultado['password']);
        return $return;
    }

}