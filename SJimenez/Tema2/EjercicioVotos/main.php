<?php

//incluimos las clases necesarias
include ("provincia.php");
include("circunscrip.php");
include ("partidos.php");

$api_url= "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts";
$api_url2 = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results";
$api_url3 = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties";

$datosCircunscripcion = json_decode(file_get_contents($api_url2), true);
$datosProvincias = json_decode(file_get_contents($api_url ), true);
$datosPartidos = json_decode(file_get_contents($api_url3), true);


$provincias[] = array();

//Creamos los objetos con la array de los datos de las provincias
function objetoProvincias($datosProvincias){
        for ($i = 0; $i < count($datosProvincias); $i++){
            $provincias[$i] = new provincia($datosProvincias[$i]['id'], $datosProvincias[$i]['name'], $datosProvincias[$i]['delegates']);
        }
        return $provincias;
}

$circuns[] = array();
//pasamos la array de los partidos a objetos
function objetosCircuns($datosCircunscripcion){

    for ($i = 0; $i < count($datosCircunscripcion); $i++){
        $circuns[$i] = new circunscrip($datosCircunscripcion[$i]['district'], $datosCircunscripcion[$i]['party'], $datosCircunscripcion[$i]['votes']);
    }

    return $circuns;
}

$partido[] = array();
function objetoPartidos($datosPartidos){

    for ($i = 0; $i < count($datosPartidos); $i++){
        $partido[$i] = new partidos($datosPartidos[$i]['id'], $datosPartidos[$i]['name'], $datosPartidos[$i]['acronym'], $datosPartidos[$i]['logo']);
    }
    return $partido;
}

$partidos = objetoPartidos($datosPartidos);
$circunscripciones = objetosCircuns($datosCircunscripcion);
$provin = objetoProvincias($datosProvincias);


var_dump($partidos[1]);
var_dump($circunscripciones[1]);
var_dump($provin[1]);
/*
function mapId($partidos, $provin){

    for ($i = 0; $i < count($partidos); $i++){

        for ($j = 0; $j < count($provin); $j++){

            if ($partidos[$i]->getId() == $provin[$j]->getIdProv()){
                $partidos[$i]->setId($provin[$j]->getNomProv());
            }

        }
    }
    return $partidos;
}

var_dump(mapId($partidos,$provin));*/
function totalVotos($circunscripciones){
$sum = 0;
foreach ($circunscripciones as $votos){
    $sum += $votos->getVotos();
}
return $sum;
}

$total = totalVotos($circunscripciones);

function porcentajeVotos($total){
    $total = $total * 3;

    $total = $total / 100;

    return $total;
}

$porcentajeVotos = porcentajeVotos($total);

function comparacionVotos($porcentajeVotos, $circunscrip){

}
echo totalVotos($circunscripciones);
echo "<pre>";
echo round(porcentajeVotos($total));

?>