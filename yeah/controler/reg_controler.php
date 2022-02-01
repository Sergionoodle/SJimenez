<?php
include_once "../model/model_regi.php";

$modelo = new model_regi();

if(isset($_POST['mail'])&&isset($_POST['password'])&&isset($_POST['password2'])){
    if($_POST['password'] == $_POST['password2']){
        $pass = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $modelo->insert($_POST['mail'], $pass);
    }else{
        echo "<script>alert('Error al crear un usuario')</script>";
    }
}

require_once "../vista/vista_reg.php";