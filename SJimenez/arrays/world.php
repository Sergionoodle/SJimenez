<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=world");
//lo primero que tienes que saber es que la array de world tiene dos arrays, entonces no podras poner world [population]
//si te fijas en la segunda funcion pasa de meter un parametro de world a poner uno de cities (una array que esta dentro de
//la array de world) y es por eso que hacemos ese lio para sacar las cosas sin ordenar
$world = json_decode($contents, true);

function getUnsortedCities($world){
    //Lo primero que hay que hacer es el tipico bucle for con la i y el count
    for ($i = 0; $i < count($world); $i++){

        //aqui cambia la cosa con el segundo bucle donde sacamos el cities y le añadimos lo de world[i]['cities']
        //porque si te fijas en la array de world en cities esta population y la necestiamos (explicar mejor en clase)
        //no se del t-odo bien bien lo que hace pero si hay un caso similar aqui lo tenemos
        for ($j = 0; $j < count($world[$i]['Cities']); $j++){

            //una vez creado el segundo bucle metemos en una array nueva que creamos lo siguiente
            $ciudades[] = $world[$i]['Cities'][$j];
            //lo que hemos contado mas una clausula mas con la j
            //Porque? no lo se, pero asi no da error
        }

    }
    return $ciudades;
    //Ahor devolvemos la array que hemos creado
}

//Ahora vamos a ordenar por population, que como ves necesitamos cities
function getSortedCitiesByPopulation($cities){
    //creamos ciudades o como quieras llamarlo y le metemos la funcion anterior
    //Que pasa que en mi caso ciudades es la array desordenada que hemos metido en la funcion anterior (si no entiendes esto avisame)
    $ciudades = getUnsortedCities($cities);

    //Ahora como antes haciamos, recorremos arrays con dos for y esta vez con la array desordenada, es decir ciudades
    for ($i = 0; $i < count($ciudades); $i++){

        //Segundo bucle que es mas de lo mismo
        for ($j = 0; $j < count($ciudades); $j++){

            //Y aqui le metemos la condicion de i y j
            if($ciudades[$i]['Population'] < $ciudades[$j]['Population']){
                //Aqui hacemos la sustitucion y recuerda usamos ciudades porque es la array desordenada, entonces la ordenamos con esta funcion
                $aux = $ciudades[$i];
                $ciudades[$i] = $ciudades[$j];
                $ciudades[$j] = $aux;
            }
        }
    }
    //Y devolvemos ciudades
    return $ciudades;

}
?>
<html lang="es">
<head>
    <title>Cities of the world</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>                                    <!--Aqui si te fijas el count es de la array desordenada, porque tiene world en vez de ciudades, porque el resto no funciona y solo puede contar la array
    principal.. y si te fijas es literal lo que pone de function getunsorted...(world)-->
        <th colspan="6">Cities of the world (<?php echo count(getUnsortedCities($world))//TODO: Logic to print the number of cities. ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted cities</th>
        <th colspan="3">Sorted cities</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //Llamamos a las dos arrays, la ordenada y la desordenada y dentro metemos el valor de world porque queremos que saque ahora
    //la informacion de world (si pruebas los otros da error tambien asi que)
    $ordenado = getSortedCitiesByPopulation($world);
    $desordenado = getUnsortedCities($world);

    //y hacemos lo de siempre un for contador con world
    for ($i = 0; $i < count($world); $i++){

        //Aqui los desordenados
        echo "<tr>";
        echo "<td>".$desordenado[$i]['ID']."</td>";
        echo "<td>".$desordenado[$i]['Name']."</td>";
        echo "<td>".$desordenado[$i]['Population']."</td>";

        //Aqui los ordenados
        echo "<td>".$ordenado[$i]['ID']."</td>";
        echo "<td>".$ordenado[$i]['Name']."</td>";
        echo "<td>".$ordenado[$i]['Population']."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>