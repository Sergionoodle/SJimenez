<?php
//incluimos el modelo
include_once "../modelo/modelo_insert_users.php";

//Creamos su variable
$modelo = new modelo_insert_users();

//Creamos las variables de error y exito
$error = "";
$return = array();

//Si consigue el password, mail y el usuario que continue
if(isset($_GET['passwd']) && isset($_GET['user']) && isset($_GET['email'])){
    $pass = password_hash($_GET['passwd'],PASSWORD_BCRYPT);

    $return['query']=$modelo->insert_usuarios($_GET['email'], $pass, $_GET['user']);

}else{
    $return['error'] = "NO SE HA REGISTRADO";
}
echo json_encode($return);