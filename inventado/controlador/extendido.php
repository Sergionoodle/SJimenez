<?php
include_once "../modelo/modificacion_precio.php";
include_once "../modelo/modelo_extendido.php";

$modelo = new modelo_extendido();

if(isset($_GET['id'])){
    $objetin = $modelo->objeto_de_list($_GET['id']);
}
session_start();


$modelo2 = new modificacion_precio();

if (isset($_POST['compra'])){
    $mod = $modelo2->mod($_GET['id'],intval($_POST['compra']));
}

require_once "../vista/vista_controlador.php";