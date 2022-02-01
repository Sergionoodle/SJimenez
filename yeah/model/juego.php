<?php

include_once "../bd/bd.php";

class juego
{

    private bd $bd;

    public function __construct()
    {
        $this->bd = new bd();
    }

    public function randomCity($id_usuario){
        //Hago la select de todas las countries que nos devulelva el Code (lo necesario para meter una citi nueva
        $select = "SELECT Code FROM countries ;";
        //Iniciamos la conexion
        $this->bd->default();
        //Hacemos que se ejecute la select
        $code = $this->bd->query($select);

        $array = array();
        while ($result = $code->fetch_assoc()){
            $array[] = $result['Code'];
        }
        //Ahora en una variable le metemos el numero random
        //funcion rand(0 al maximo que tiene una array)
        $numero = rand(0, count($array));

        $sql = "UPDATE countries SET UserId='".$id_usuario."' WHERE Code='".$array[$numero]."';";
        $this->bd->query($sql);
        $this->bd->close();

    }

    //funcion para saber si teiene una ciudad
    public function tieneCiudad($id){
        $sql = "SELECT * FROM countries WHERE UserId = ".$id.";";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        //Si tiene una ciudad dará true
        while ($resultado = $query->fetch_assoc()){
            return true;
        }
        $this->randomCity($id);
        return false;

    }

    //Funcion para atacar
    public function ataca($code, $user_id){
        $sql = "UPDATE countries SET UserId=".$user_id." WHERE Code ='".$code."';";
        $this->bd->default();
        $this->bd->query($sql);
        $this->bd->close();
    }

}