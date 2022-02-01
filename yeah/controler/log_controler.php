<?php
include_once "../model/model_inicio.php";

$model = new model_inicio();

if(isset($_POST['mail']) && isset($_POST['password'])){

    $user = $model->select_users($_POST['mail']);

    $pass_verif = password_verify($_POST['password'], $user->getPassword());

    if($pass_verif){
        session_start();
        $_SESSION['log'] = true;
        $_SESSION['u_id'] = $user->getId();
        header("Location: ../controler/lista.php");
    }else{
        echo "<script>alert('Error al iniciar sesion')</script>";
    }
}

require_once "../vista/vista_log.php";