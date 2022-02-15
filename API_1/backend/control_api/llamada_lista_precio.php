<?php
include_once "../modelo/model_principal.php";
$model = new model_principal();

//creamos una variable con la funcion
$json = $model->listado_hoteles_precio();

//la json encodeamos y la ejecutamos y el navegador nos da nuestra api
echo json_encode($json);