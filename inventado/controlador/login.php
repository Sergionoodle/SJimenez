<?php

include_once "../modelo/modelo_usuario_login.php";

$modelo = new modelo_usuario_login();

if(isset($_POST['name_log']) && isset($_POST['password_log'])){

    $datos = $modelo->select_usuarios($_POST['name_log']);

    $pass_verif = password_verify($_POST['password_log'],$datos->getPassword());

    if($pass_verif == true){
        session_start();
        $_SESSION['log'] = true;
        $_SESSION['nom'] = $datos->getMail();
        header("Location: ../controlador/controlador_lista.php");
    }else{
        echo "<script>alert('ERROR')</script>";
    }
}

require_once "../vista/login_vista.php";
