<?php

//API DE DATOS
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . 4444 . "&data=";
$charactersJ = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJ = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJ = json_decode(file_get_contents($api_url . "locations"), true);

//CREDENCIALES
$servername ="localhost";
$username = "root";
$password = "";
$dbname ="rickymorty";

//CONEXION
$conn = new mysqli($servername, $username, $password,$dbname);
if($conn->connect_error){
    echo "No se pudo conectar". $conn->connect_error;
}else{
    echo  "Connected successfully";
}

//  --CREAMOS LA BASE DE DATOS--
$sql = "CREATE DATABASE IF NOT EXISTS rickymorty";
if($conn->query($sql) === TRUE ){
    echo "<br>BASE DE DATOS CREADA";
}else{
    echo "ERROR ".$conn->error;
}

// --CREAMOS LAS TABLAS--
    $sql ="";
    $sql .= "CREATE TABLE IF NOT EXISTS characters(";
    $sql .= "id int PRIMARY KEY,";
    $sql .= "name varchar(255),";
    $sql .= "status varchar(255),";
    $sql .= "specie varchar(255),";
    $sql.= "type varchar(255)";
    $sql.=",gender varchar(255),";
    $sql.="origin varchar(255),";
    $sql .= "location varchar(255),";
    $sql.="image varchar(255),";
    $sql .= "created varchar(255));";

if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else {
    echo "ERROR" . $conn->error;
}

    $sql = "";
    $sql .= "CREATE TABLE IF NOT EXISTS episodes";
    $sql .= "(id int PRIMARY KEY, name varchar(255),";
    $sql .= "air_date varchar(255),";
    $sql .= "episode varchar(255),";
    $sql .= "created varchar(255));";

if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else {
    echo "ERROR" . $conn->error;
}
    //Creamos esta tabla porque una de las tablas de la api tiene una array
    $sql = "";
    $sql .= "CREATE TABLE IF NOT EXISTS episodesAndCharacters (";
    $sql .= "epiCharId int AUTO_INCREMENT PRIMARY KEY,";
    $sql .= "idCharacter int,";
    $sql .= "idEpisodes int,";
    $sql .= "FOREIGN KEY (idCharacter) REFERENCES characters(id) ON DELETE CASCADE,";
    $sql .= "FOREIGN KEY (idEpisodes) REFERENCES episodes(id) ON DELETE CASCADE);";
if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else{
    echo "ERROR".$conn->error;
}

    $sql ="";
    $sql .= "CREATE TABLE IF NOT EXISTS location (";
    $sql .= "id int PRIMARY KEY,";
    $sql .= "name varchar(255),";
    $sql .= "type varchar(255),";
    $sql .= "dimension varchar(255),";
    $sql .= "created varchar(255));";
if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else{
    echo "ERROR".$conn->error;
}






$conn->close();

?>