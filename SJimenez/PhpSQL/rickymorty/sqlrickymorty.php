<?php

$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . 4444 . "&data=";

$charactersJ = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJ = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJ = json_decode(file_get_contents($api_url . "locations"), true);

$servername ="localhost";
$username = "root";
$password = "";
$dbname ="rickymorty";

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
    echo "No se pudo conectar". $conn->connect_error;
}else{
    echo  "Connected successfully";
}

/* --CREAMOS LA BASE DE DATOS-- *
$sql = "CREATE DATABASE rickymorty";

if($conn->query($sql) === TRUE ){
    echo "BASE DE DATOS CREADA";
}else{
    echo "ERROR ".$conn->error;
}
*/

$sql="";

for ($i = 0; $i < count($charactersJ); $i++) {

    $charid[]=$charactersJ[$i]["id"];
    $charid[$i]=$conn->real_escape_string($charid[$i]);

    $charname[]=$charactersJ[$i]["name"];
    $charname[$i]=$conn->real_escape_string($charname[$i]);

    $charstat[] = $charactersJ[$i]['status'];
    $charstat[$i]=$conn->real_escape_string($charstat[$i]);

    $charspec[] = $charactersJ[$i]['species'];
    $charspec[$i]=$conn->real_escape_string($charspec[$i]);

    $typech[] = $charactersJ[$i]['type'];
    $typech[$i]=$conn->real_escape_string($typech[$i]);

    $gen[] = $charactersJ[$i]['gender'];
    $gen[$i]=$conn->real_escape_string($gen[$i]);

    $orin[] = $charactersJ[$i]['origin'];
    $orin[$i]=$conn->real_escape_string($orin[$i]);
    $loca[] = $charactersJ[$i]['location'];
    $loca[$i]=$conn->real_escape_string($loca[$i]);
    $img[] = $charactersJ[$i]['image'];
    $img[$i]=$conn->real_escape_string($img[$i]);
    $creat[] = $charactersJ[$i]['created'];
    $creat[$i]=$conn->real_escape_string($creat[$i]);

    $sql .= "INSERT INTO characters (id_characters, name_characters, status, specie, type, gender, origin, location, image, created) VALUES (";
    $sql .= "" . $charid[$i] . ",'" . $charname[$i] . "','" . $charstat[$i] . "','" .  $charspec[$i] . "','" . $typech[$i] . "','" . $gen[$i] . "'," . $orin[$i] . "," .$loca[$i] . ",'" . $img[$i] . "','" . $creat[$i]."'";
    $sql .= ");";
}
if ($conn->multi_query($sql) === TRUE){
    echo "Se ha creado correctamente";
}else {
    echo $conn->error;

}
$conn->close();

?>