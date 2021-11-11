<?php
$servername ="localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    echo "No se pudo conectar". $conn->connect_error;
}else{
    echo  "Connected successfully";
}

echo "<br>";
/*
$sql = "CREATE DATABASE rickymorty";

if($conn->query($sql) === TRUE ){
    echo "BASE DE DATOS CREADA";
}else{
    echo "ERROR ".$conn->error;
}
$conn->close();
*/

function datosCharacter(){

}
?>