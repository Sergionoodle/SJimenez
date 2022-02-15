<?php

if(isset($_POST['email']) && isset($_POST['passwd'])){
    $user = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_login.php?email=".$_POST['email']."&passwd=".$_POST['passwd']));
    if($user->id > 0){
        session_start();
        $_SESSION['usuario'] = $user->usuario;
        $_SESSION['login'] = true;
        $_SESSION['email'] = $user->email;
        header("Location: control_lista.php");
    }else{
        echo "<script>alert('Error al iniciar sesion')</script>";
    }
}

require_once "../vista/login.php";