<?php
include_once "../modelo/modelo_update.php";

$modelo = new modelo_update();

$return = array();
$error = "";

if(isset($_GET['precio']) && isset($_GET['id'])){
    $return['exito'] = $modelo->mod_precio($_GET['id'], $_GET['precio']);
}else{
    $return['error']="ID NO SELECCIONADO";
}
echo json_encode($return);