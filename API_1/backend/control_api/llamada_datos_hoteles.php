<?php
include_once "../modelo/modelo_datos.php";

$model = new modelo_datos();

//Se crean una array y un mensaje de error
$error = "";
$return = array();

//Se pilla lo necesario
if(isset($_GET['id'])){

    //Si lo consigue nos hace la funcion
    $return['hotel'] = $model->hotel_dato($_GET['id']);

//En caso de que no nos sale error
}else{
    $return['error'] = "NO ID SELECCIONADO ";
}

echo json_encode($return);

