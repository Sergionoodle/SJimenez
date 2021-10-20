<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);

//Para mapear se hace lo siguiente
function mapCities() {
    //Primero se declaran globales las dos arrays que tenemos
    global $cities;
    global $countries;

    //Ahora las recorremos las dos para compararlas
    for ($i = 0; $i < count($cities);$i++){

        for ($j = 0; $j < count($countries); $j++){

            //Ahora se hace la condicion para mapear
            // recuerda que todo esto se sabe del jsoon y con el validador sera mas facil

            //Si ciudades con su country code es ifual a countries con su code
            if ($cities[$i]['CountryCode'] == $countries[$j]['Code']){

                //Se cumple la condicion que country name pasa a ser el nombre de countries
                $cities[$i]['CountryName'] = $countries[$j]['Name'];
                //es decir creamos el nombre de ciudades dentro de cities y lo sustituimos
                //o introducimos la informacion de countries name
            }
        }
    }
    //Ahora hacemos un return
    return $cities;
}

function mapCountries() {
    //Aqui practicamente lo mismo
    global $cities;
    global $countries;

    for ($i = 0; $i < count($countries); $i++){//Ahora sabemos que tenemos que usar countries porque pasa a ser la
        //principal

        for ($j = 0; $j < count($cities); $j++){
            if ($countries[$i]['CountryCode'] == $cities[$j]['Code']){
                $countries[$i]['CountryName'] = $cities[$j]['Name'];
            }
        }

    }
    return $countries;

}
echo "<pre>";
//var_dump(mapCities());
var_dump(mapCountries());