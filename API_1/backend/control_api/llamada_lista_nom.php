<?php
include_once "../modelo/model_principal.php";
//Creamos el modelo para llamar sus funciones
$model = new model_principal();

//Lo metemos dentro de una variable
$json = $model->listado_hoteles_nombre();

//la ejecutamos y la ruta que nos da el navegador va en el front y sera nuestra api
echo json_encode($json);