<?php

include_once "../entiti/users.php";
include_once "../bd/bd.php";

class model_inicio
{

    private bd $bd;

    public function __construct()
    {
        $this->bd = new bd();
    }

    public function select_users($mail){
        $sql = "SELECT * FROM users WHERE Mail='".$mail."';";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $resultado = $query->fetch_assoc();
        $return = new users($resultado['Id'], $resultado['Mail'], $resultado['Password']);
        return $return;
    }

}