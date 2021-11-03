<?php

//incluimos las clases necesarias
include ("provincia.php");
include("resultado.php");
include ("partidos.php");

$api_url= "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts";
$api_url2 = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results";
$api_url3 = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties";

$datosResultados = json_decode(file_get_contents($api_url2), true);
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


function objetosResultados($datosResultados){

    for ($i = 0; $i < count($datosResultados); $i++){
        $resultados[$i] = new resultado($datosResultados[$i]['district'], $datosResultados[$i]['party'], $datosResultados[$i]['votes']);
    }


    return $resultados;
}
$partido[] = array();
function objetoPartidos($datosPartidos){

    for ($i = 0; $i < count($datosPartidos); $i++){
        $partido[$i] = new partidos($datosPartidos[$i]['id'], $datosPartidos[$i]['name'], $datosPartidos[$i]['acronym'], $datosPartidos[$i]['logo']);
    }
    return $partido;
}

$partidosOb = objetoPartidos($datosPartidos);
$resultadosOb = objetosResultados($datosResultados);
$provinOb = objetoProvincias($datosProvincias);

function filtracion(){

}
?>
<head>
    <title>Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 12px;
            padding-right: 12px;
        }
    </style>
</head>
<body>
<form action="main.php" method="post">
    <?php

    echo '<select name="sorting">';
    for ($i = 0; $i < count($provinOb); $i++){
        echo '<option value="'.$provinOb[$i]->getNomProv().'">'.$provinOb[$i]->getNomProv().'</option>';
    }
    echo '</select>';

    if (isset($_POST["sorting"])) {
        $sortby = strval($_POST["sorting"]);
    }
    ?>

    <input type="submit" value="Filtra">

</form>
<?php
echo '<tbody>';
echo '<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>';
for ($i = 0; $i < count($resultadosOb);$i++){

    if($resultadosOb[$i]->getDistrito() == $sortby){
        echo '<tr>
                        <td>'.$resultadosOb[$i]->getDistrito().'</td>
                        <td>'.$resultadosOb[$i]->getPartido().'</td>
                        <td>'.$resultadosOb[$i]->getVotos().'</td>
                        <td>'."x".'</td>
                        </tr>';

    }

}
echo '</tbody>';

?>
</body>
