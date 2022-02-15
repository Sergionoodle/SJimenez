<?php
include_once "../bdd/bas.php";
include_once "../entidades/usuarios_hoteles.php";

class modelo_login
{

    private bas $dbb;

    public function __construct()
    {
        $this->dbb = new bas();
    }

    public function login($mail,$pass){
        $this->dbb->default();
        $sql = "SELECT * FROM usuarios_hoteles WHERE email='".$mail."';";
        $query = $this->dbb->query($sql);
        if($result = $query->fetch_assoc()){
            if(password_verify($pass, $result['password'])){
                return new usuarios_hoteles($result['id'],$result['email'],$result['password'],$result['usuario']);
            }
        }
        return new usuarios_hoteles(0,"-","-","-");
    }

}