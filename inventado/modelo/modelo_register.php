<?php

include_once "../dbb/dbo.php";
include_once "../entidades/usuarios.php";

class modelo_register
{
    private dbo $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }

    public function ingresar($mail, $password){
        $sql = "INSERT INTO usuarios(mail, password) VALUES('".$mail."','".$password."');";
        $this->dbo->default();
        if(!$this->dbo->query($sql)){
            echo "<script>alert('ERROR AL CREAR USUARIO')</script>";
        }else{
            header("Location: ../controlador/controlador_lista.php");
        }
        $this->dbo->close();

    }

}