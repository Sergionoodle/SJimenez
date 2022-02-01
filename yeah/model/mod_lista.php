<?php

include_once "../bd/bd.php";
include_once "../entiti/users.php";
include_once "../entiti/cities.php";
include_once "../entiti/countries.php";
include_once "../entiti/countrylanguage.php";

class mod_lista
{

    private bd $bd;

    public function __construct()
    {
        $this->bd = new bd();
    }

    public function listado(){
        $sql = "SELECT * FROM countries";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new countries($resultado['Code'],$resultado['Name'],$resultado['Population'],$resultado['GNP'],$resultado['Capital'], $this->get_user($resultado['UserId']),$this->getLang($resultado['Code']),$this->getCities($resultado['Code']));
        }
        return $return;
    }

    public function get_user($UserId)
    {
        if($UserId != null){
            $sql = "SELECT * FROM users WHERE Id=".$UserId;
            $this->bd->default();
            $query = $this->bd->query($sql);
            $this->bd->close();
            $resultado = $query->fetch_assoc();
            $return = new users($resultado['Id'],$resultado['Mail'],$resultado['Password']);
            return $return;
        }else{
            return new users(0,"-","-");
        }
    }

    public function getLang($Code)
    {
        $sql = "SELECT * FROM countrylanguages WHERE CountryCode='".$Code."';";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new countrylanguage($resultado['Language']);
        }
        return $return;
    }

    public function getCities($Code)
    {
        $sql = "SELECT * FROM cities WHERE CountryCode='".$Code."';";
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new cities($resultado['ID'],$resultado['Name']);
        }
        return $return;
    }

    public function listado_usuarios($u_id)
    {
        $sql = "SELECT * FROM countries WHERE UserId=".$u_id;
        $this->bd->default();
        $query = $this->bd->query($sql);
        $this->bd->close();
        $return = array();
        while ($resultado = $query->fetch_assoc()){
            $return[] = new countries($resultado['Code'],$resultado['Name'],$resultado['Population'],$resultado['GNP'],$resultado['Capital'], $this->get_user($resultado['UserId']),$this->getLang($resultado['Code']),$this->getCities($resultado['Code']));
        }
        return $return;
    }


}