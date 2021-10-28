<?php

//incluimos las clases necesarias
include ("provincia.php");
include ("partido.php");

$api_url= "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts";
$api_url2 = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results";

$datosPartidos = json_decode(file_get_contents($api_url2), true);
$datosProvincias = json_decode(file_get_contents($api_url ), true);

$provincias[] = array();

//Creamos los objetos con la array de los datos de las provincias
function objetoProvincias($datosProvincias){
        for ($i = 0; $i < count($datosProvincias); $i++){
            $provincias[$i] = new provincia($datosProvincias[$i]['id'], $datosProvincias[$i]['name']);
        }
        return $provincias;
}

$partidos[] = array();
//pasamos la array de los partidos a objetos
function objetosPartido($datosPartidos){

    for ($i = 0; $i < count($datosPartidos); $i++){
        $partidos[$i] = new partido($datosPartidos[$i]['district'], $datosPartidos[$i]['party'], $datosPartidos[$i]['votes']);
    }

    return $partidos;
}

var_dump(objetosPartido($datosPartidos));


?>