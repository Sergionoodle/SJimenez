<?php
include_once "../modelo/modelo_login.php";

$modelo = new modelo_login();

if(isset($_GET['email']) && isset($_GET['passwd'])){
    $user = $modelo->login($_GET['email'],$_GET['passwd']);
    echo json_encode($user);
}else{
    echo json_encode(new usuarios_hoteles(0,"n","o","o"));
}