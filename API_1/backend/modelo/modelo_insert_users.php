<?php
include_once "../entidades/usuarios_hoteles.php";
include_once "../bdd/bas.php";

class modelo_insert_users
{

    private bas $dbb;

    public function __construct()
    {
        $this->dbb = new bas();
    }

    public function insert_usuarios($mail, $pass, $user){
        $sql = "INSERT INTO `usuarios_hoteles`(`email`, `password`, `usuario`) VALUES ('".$mail."','".$pass."','".$user."')";
        $this->dbb->default();
        if(!$this->dbb->query($sql)){
            echo "<script>alert('Error en el registro')</script>";
        }else{
            header("Location: ../../frontend/controlador/control_lista.php");
        }
        $this->dbb->close();


    }

}
