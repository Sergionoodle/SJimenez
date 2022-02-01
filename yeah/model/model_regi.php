<?php

include_once "../entiti/users.php";
include_once "../bd/bd.php";

class model_regi
{

    private bd $bd;

    public function __construct()
    {
        $this->bd = new bd();
    }

    public function insert($mail,$pass){
        $sql = "INSERT INTO users (Mail, Password) VALUES ('".$mail."','".$pass."');";
        $this->bd->default();
        if(!$this->bd->query($sql)){
            echo "<script>alert('Error al registrarte')</script>";
        }else{
            header("Location: ../controler/log_controler.php");
        }
        $this->bd->close();
    }
}