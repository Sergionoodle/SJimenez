<?php
//API DE LOS DATOS
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . 4444 . "&data=";
$charactersJ = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJ = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJ = json_decode(file_get_contents($api_url . "locations"), true);

//CREDENCIALES
$servername ="localhost";
$username = "root";
$password = "";

$basededatos = "rickymorty";

//CONEXION
$conn = new mysqli($servername, $username, $password,$basededatos);
if($conn->connect_error){
    echo "No se pudo conectar". $conn->connect_error;
}else{
    echo  "Connected successfully";
}

//CREAMOS LA BASE DE DATOS
$sql = "CREATE DATABASE IF NOT EXISTS rickymorty";
if($conn->query($sql) === TRUE){
    echo "<br>Creado con exito";
}else{
    echo "ERROR";
}

//CREAMOS TABLAS
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
$sentencia = "";
//INSERTAMOS LOS VALORES DE LA API
/*
for($i = 0; $i < count($locationsJ); $i++){
  $sentencia .= "INSERT INTO location (id, name, type, dimension, created) VALUES (";
  $sentencia .= $locationsJ[$i]['id'].",'".$conn->real_escape_string($locationsJ[$i]['name'])."','".$locationsJ[$i]['type']."','".$locationsJ[$i]['dimension']."','".$conn->real_escape_string($locationsJ[$i]['created'])."');";

}
------------------------------------------
*/
/*
for ($i = 0; $i < count($episodesJ);$i++){
    $sentencia .= "INSERT INTO episodes (id, name, air_date, episode, created) VALUES(";
    $sentencia .= $episodesJ[$i]['id'].",'".$conn->real_escape_string($episodesJ[$i]['name'])."','".$episodesJ[$i]['air_date']."','".$conn->real_escape_string($episodesJ[$i]['episode'])."','".$episodesJ[$i]['created']."');";

}
if ($conn->multi_query($sentencia)===TRUE){
    echo "<br>insertado con exito";
}else{
    echo "<br>".$conn->error;
}
*/
/* ---------------------------------------

for ($i = 0; $i < count($charactersJ); $i++){
    $sentencia .= "INSERT INTO characters (id, name, status, specie, type, gender, origin, location, image, created) VALUES (";
    $sentencia .= "".$charactersJ[$i]['id'].",'".$conn->real_escape_string($charactersJ[$i]['name'])."','".$charactersJ[$i]['status']."','".$charactersJ[$i]['specie']."','".$charactersJ[$i]['type']."','".$charactersJ[$i]['gender']."','".$charactersJ[$i]['origin']."','".$charactersJ[$i]['location']."','".$charactersJ[$i]['image']."','".$charactersJ[$i]['created']."');";
}
*/

for ($i = 0; $i < count($episodesJ); $i++){

    for ($j = 0; $j < count($episodesJ[$i]['episodes']); $j++){
        $sentencia .= "INSERT INTO episodesAndCharacters(idEpisodes) VALUES (";
        $sentencia .= "'".$episodesJ[$j]['episodes']."');";
    }

}

if ($conn->multi_query($sentencia)===TRUE){
    echo "<br>insertado con exito";
}else{
    echo $conn->error;
}

$conn->close();

?>