<?php
include_once "../modelo/model_principal.php";

//Llamamos al modelo para trabajar con sus funciones
$model = new model_principal();

//Creamos la funcion y la metemos en una variable
$json = $model->listado_hoteles();

//Hacemos que esta funcion se creee con json encodeado
$api_lista = json_encode($json);

//damos echo y ejecutamos y la ruta del navegador sera nuestra api (esto va en el front)
echo $api_lista;