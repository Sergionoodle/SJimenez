<?php

//incluimos las clases necesarias
include ("provincia.php");
include("resultado.php");
include ("partidos.php");

//todo AHORA VAMOS A USAR LA BASE DE DATOS EN VEZ DE LA API

//CREAMOS UNA CONEXION Y NO OLVIDES CERRARLA
$servername = "localhost";
$username = "root";
$password = "";
$basededatos = "elecciones";

$conn = new mysqli($servername, $username, $password, $basededatos);
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}

//CREAMOS UNA FUNCION PARA USAR UN SELECT DE TODA LA TABLA
function selectResultados(){
    global $conn;//creamos el conn global
    $array = []; //una array donde meter los valores
    $contador = 0;//Un contador para ir incrementando

    $query = "SELECT * FROM resultado";//Creamos el select
    $resultado = $conn->query($query); //creamos un resultado que guarde la ejecucion de la query

    while ($row = $resultado->fetch_assoc()){//Asi metemos una array asociativa
        $array[$contador]=$row;
        $contador++;
    }
    return $array;
}

function selectCircuns(){
    global $conn;//creamos el conn global
    $array = []; //una array donde meter los valores
    $contador = 0;//Un contador para ir incrementando

    $query = "SELECT * FROM circunscripciones";//Creamos el select
    $resultado = $conn->query($query); //creamos un resultado que guarde la ejecucion de la query

    while ($row = $resultado->fetch_assoc()){//Asi metemos una array asociativa
        $array[$contador]=$row;
        $contador++;
    }
    return $array;
}

function selectPartidos(){
    global $conn;//creamos el conn global
    $array = []; //una array donde meter los valores
    $contador = 0;//Un contador para ir incrementando

    $query = "SELECT * FROM partidos";//Creamos el select
    $resultado = $conn->query($query); //creamos un resultado que guarde la ejecucion de la query

    while ($row = $resultado->fetch_assoc()){//Asi metemos una array asociativa
        $array[$contador]=$row;
        $contador++;
    }
    return $array;
}

$provincias[] = array();

//Creamos los objetos con la array de provincias
function objetoProvincias(/*$datosProvincias*/){
    //TODO -> ahora aqui sustituimso datosProvincias por las funciones de select
    $provin = selectCircuns();
    for ($i = 0; $i < count($provin); $i++){//TODO => y los nombres ['xxx'] pasan a ser de la base de datos
        $provincias[$i] = new provincia($provin[$i]['id'], $provin[$i]['nombre'], $provin[$i]['delegados']);
    }
    return $provincias;
}

$circuns[] = array();

//Creamos los objetos de la array de resultados
function objetosResultados(){
    $result = selectResultados();
    for ($i = 0; $i < count($result); $i++){
        $resultados[$i] = new resultado($result[$i]['distrito'], $result[$i]['partido'], $result[$i]['votos']);
    }

    return $resultados;
}
$partido[] = array();

//Creamos los objetos de la array partidos
function objetoPartidos(){
    $party = selectPartidos();
    for ($i = 0; $i < count($party); $i++){
        $partido[$i] = new partidos($party[$i]['id'], $party[$i]['nombre'], $party[$i]['acronimo'], $party[$i]['logo']);
    }
    return $partido;
}

//TODO SUSTITUIR

//Asignamos a cada uno una variable
$partidosOb = objetoPartidos();
$resultadosOb = objetosResultados();
$provinOb = objetoProvincias(/*$datosProvincias*/);

//filtramos por partidos
function filtroPartidos($nombrePartido){
    global  $partidosOb;
    $datosFiltro[] = Array();
    $contador = 0;
    for ($i = 0; $i < count($partidosOb); $i++ ){
        if($partidosOb[$i]->getNombre() == $nombrePartido){
            $datosFiltro[$contador] = $partidosOb[$i];
            $contador++;
        }
    }
    return $datosFiltro;
}

//Calculamos los escaños
function calculoEscanos($nomProvin, $delegados){
    $datosFiltro[] = Array();
    $contador = 0;
    global $resultadosOb;

    //Metemos los datos en un filtro
    for ($i = 0; $i < count($resultadosOb); $i++){
        if($resultadosOb[$i]->getDistrito() == $nomProvin){
            $datosFiltro[$contador] = $resultadosOb[$i];
            $contador++;
        }
    }


    //asignamos
    for ($j = 0; $j < $delegados; $j++){//escaños
        $mayor = 0;
        for ($x = 0; $x < count($datosFiltro); $x++){//partidos
            if($datosFiltro[$x]->getVotos()/$datosFiltro[$x]->getDivisor() > $datosFiltro[$mayor]->getVotos()/$datosFiltro[$mayor]->getDivisor()){
                $mayor = $x;
            }
        }
        $aumentoDiv = $datosFiltro[$mayor]->getDivisor()+1;
        $aumentoEscanos = $datosFiltro[$mayor]->getEscanos()+1;
        $datosFiltro[$mayor]->setDivisor($aumentoDiv);
        $datosFiltro[$mayor]->setEscanos($aumentoEscanos);
    }


}

//Funcion a ejecutar para hacer los escaños
function hacerEscanos($provinOb){

    for ($i = 0; $i < count($provinOb); $i++){

        calculoEscanos($provinOb[$i]->getNomProv(), $provinOb[$i]->getDelegados());

    }
}

hacerEscanos($provinOb);

//Mapeamos para conseguir los totales de Votos y escaños
function mapeo(){

    global $partidosOb;
    global $resultadosOb;

    for ($i = 0; $i < count($partidosOb); $i++){
        $escanosTotales = 0;
        $votosTotales = 0;

        for ($j = 0; $j < count($resultadosOb); $j++){

            if ($partidosOb[$i]->getNombre() == $resultadosOb[$j]->getPartido()){

                $escanosTotales += $resultadosOb[$j]->getEscanos();
                $votosTotales += $resultadosOb[$j]->getVotos();

            }

        }
        $partidosOb[$i]->setTotalVotos($votosTotales);
        $partidosOb[$i]->setTotalEscanos($escanosTotales);
    }

}

$conn->close();

mapeo();

?>

<html>
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
        img{
            height: 25px;
        }

    </style>
</head>
<body>
<center>
    <form action="main.php" method="post">
        <?php
        //Primer formulario donde podemos elegir lo que queremos ver
        echo '<select name="porOrdenar">';
        echo '<option value="ordenProvincias">Ordenar por Provincias</option>';
        echo '<option value="ordenParty">Ordenar por Partidos</option>';
        echo '<option value="generalOrder">General</option>';
        echo '</select>';

        //No consegui hacer que se quedase con lo que escogias
        echo '<input type="submit" value="Elección">';
        echo '<p>'."Recuerda seleccionar esta casilla en cada busqueda.".'</p>';

        if(isset($_POST['porOrdenar'])){
            $sort = strval($_POST['porOrdenar']);
        }

        //Condicion para cuando escojas ordenar por provincias
        if($sort == 'ordenProvincias') {

//Formulario de la tabla de provincias

            echo '<br>';
            echo '<select name="sorting">';
            for ($i = 0; $i < count($provinOb); $i++) {
                echo '<option value="' . $provinOb[$i]->getNomProv() . '">' . $provinOb[$i]->getNomProv() . '</option>';
            }
            echo '</select>';
            if (isset($_POST["sorting"])) {
                $sortby = strval($_POST["sorting"]);
            }
            echo '<input type="submit" value="Filtra">';

//RESULTADO DE ORDENAR X PROVINCIAS
            echo '<table>';
            echo '<tbody>';
            echo '<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>';
            for ($i = 0; $i < count($resultadosOb); $i++) {

                if ($resultadosOb[$i]->getDistrito() == $sortby) {
                    echo '<tr>
                        <td>' . $resultadosOb[$i]->getDistrito() . '</td>
                        <td>' . $resultadosOb[$i]->getPartido() . '</td>
                        <td>' . $resultadosOb[$i]->getVotos() . '</td>
                        <td>' . $resultadosOb[$i]->getEscanos() . '</td>
                        </tr>';
                }

            }
            echo '</tbody>';
            echo '</table>';

//Condicion para cuando escojas ordenar por partido
        }elseif ($sort == 'ordenParty') {

            echo '<br>';

//Formulario de ordenar por partido
            echo '<select name="sortPartidos">';
            for ($i = 0; $i < count($partidosOb); $i++) {
                echo '<option value="' . $partidosOb[$i]->getNombre() . '">' . $partidosOb[$i]->getNombre() . '</option>';
            }
            echo '</select>';
            if (isset($_POST["sortPartidos"])) {
                $sortbyP = strval($_POST["sortPartidos"]);
            }
            echo '    <input type="submit" value="partidos">';


//Resultado de ordenar por partido
            $filtroParty = filtroPartidos($sortbyP);
            echo '<table>';
            echo '<tbody>';
            echo '<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>';


            for ($i = 0; $i < count($resultadosOb); $i++) {

                if ($resultadosOb[$i]->getPartido() == $sortbyP) {
                    echo '<tr>';
                    echo '<td>' . $resultadosOb[$i]->getDistrito() . '</td>';
                    echo '<td><img src=' . $filtroParty[0]->getLogo(). '>' . ' ' . $resultadosOb[$i]->getPartido() . '</td>';
                    echo '<td>' . $resultadosOb[$i]->getVotos();
                    echo '</td>';
                    echo '<td>' . $resultadosOb[$i]->getEscanos() . '</td>';
                    echo '</tr>';
                }

            }

            echo '</tbody>';
            echo '</table>';

//Condicion si escojes la opcion de general
        }elseif($sort == 'generalOrder') {

//Resultado de ordenar por general
            echo '<br>';
            echo '<table>';
            echo '<tbody>';
            echo '<tr><th>Circumscripción</th><th>Partido</th><th>Votos</th><th>Escaños</th></tr>';

            for ($i = 0; $i < count($partidosOb); $i++) {

                echo '<tr>';
                echo '<td>General</td>';
                echo '<td><img src=' . $partidosOb[$i]->getLogo() . '>' . ' ' . $partidosOb[$i]->getAcronimo() . '</td>';
                echo '<td>';
                echo $partidosOb[$i]->getTotalVotos();
                echo '</td>';
                echo '<td>'.$partidosOb[$i]->getTotalEscanos().'</td>';
                echo '</tr>';
            }
        }
        ?>
    </form>
</center>
</body>
</html>