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

for ($i = 0; $i < count($charactersJ); $i++){

}


$conn->close();

?>