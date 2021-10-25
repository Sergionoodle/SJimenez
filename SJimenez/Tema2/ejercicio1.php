<?php

include ("Character.php");
include ("Episodes.php");
include ("Locations.php");

$seed = 4312; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

$charactersJ = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJ = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJ = json_decode(file_get_contents($api_url . "locations"), true);

var_dump($locationsJ);

function obCharacters($charactersJ)
{

    for ($i = 0; $i < count($charactersJ); $i++) {

        $characters[$i] = new Character($charactersJ[$i]['id'], $charactersJ[$i]['name'],
            $charactersJ[$i]['status'], $charactersJ[$i]['species'], $charactersJ[$i]['type'],
            $charactersJ[$i]['gender'], $charactersJ[$i]['origin'], $charactersJ[$i]['location'],
            $charactersJ[$i]['image'], $charactersJ[$i]['created'], $charactersJ[$i]['episodes']);
    }
    return $characters;
}

function odEpisodes($episodesJ){

    for ($i = 0; $i < count($episodesJ); $i++){

        $episodes[$i] = new Episodes($episodesJ[$i]['id'], $episodesJ[$i]['name'], $episodesJ[$i]['air_date'],
        $episodesJ[$i]['episode'], $episodesJ[$i]['created'], $episodesJ[$i]['characters']);
    }
return $episodes;
}

function obLocations($locationsJ){

    for ($i = 0; $i < count( $locationsJ); $i++){
        $locations[$i] = new Locations($locationsJ[$i]['id'], $locationsJ[$i]['name'], $locationsJ[$i]['type'],
            $locationsJ[$i]['dimension'], $locationsJ[$i]['created'], $locationsJ[$i]['residents']);
    }
    return $locations;
}
?>