<?php

include_once "../modelo/modelo_register.php";

$modelo = new modelo_register();

if(isset($_POST['name']) && isset($_POST['password'])){
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $modelo->ingresar($_POST['name'],$pass);
}


require_once "../vista/register_vista.php";