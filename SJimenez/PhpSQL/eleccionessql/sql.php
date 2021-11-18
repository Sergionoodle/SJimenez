<?php

//Credenciales
$servername = "localhost";
$username = "root";
$password = "";

//AQUI
$bdnombre = "elecciones";

//api que queremos pasar a la base de datos
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";;
$resultados = json_decode(file_get_contents($api_url . "results"), true);
$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$distritos = json_decode(file_get_contents($api_url . "districts"), true);

//establecemos una conexion
$conn = new mysqli($servername,$username, $password,$bdnombre);

//Comprobamos si falla o no
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}

//variable para querys
$sql="";


//Creamos una base de datos en la cual trabajar
$sql .= "CREATE DATABASE IF NOT EXISTS elecciones";
if ($conn->query($sql) === TRUE){
    echo "EXITO";
}else{
    echo "NO EXITO";
}//UNA VEZ ESTO LO QUE HACEMOS ES LLAMAR A LA BASE

$sql = "";

//CREAMOS LAS TABLAS POR CODIGO
$sql.= "CREATE TABLE IF NOT EXISTS circunscripciones (";
$sql .= "id int PRIMARY KEY,";
$sql .= "nombre varchar (255),";
$sql .= "delegados int);";

if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else{
    echo "ERROR";
}
$sql = "";

$sql .= "CREATE TABLE IF NOT EXISTS  partidos (id int primary key, nombre varchar (255), acronimo varchar (255), logo varchar(255), color varchar(255))";
if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else{
    echo "ERROR";
}
$sql = "";

$sql .= "CREATE TABLE IF NOT EXISTS resultado (distrito varchar(255), partido varchar(255), votos int)";
if($conn->multi_query($sql) === TRUE){
    echo "<br>CREADA CON EXITO";
}else{
    echo "ERROR";
}
$sql = "";

//INSERTAMOS LOS DATOS DE JSON A LA BASE DE DATOS
/*
for ($i = 0; $i < count($resultados); $i++){
    $sql .= "INSERT INTO resultado (distrito, partido, votos) VALUES ("; //lo de abajo lo hacemos porque party tiene , . '
    $sql .= "'".$resultados[$i]['district']."','".$conn->real_escape_string($resultados[$i]['party'])."','".$resultados[$i]['votes']."');";
}
if ($conn->multi_query($sql)=== TRUE){
    echo "<br>INSERTADO CON EXITO";
}else{
    echo "ERROR".$conn->error;
}

for ($i = 0; $i < count($partidos); $i++){
    $sql .= "INSERT INTO partidos (id, nombre, acronimo, logo, color) VALUES (";
    $sql .= "".$partidos[$i]['id'].",'".$conn->real_escape_string($partidos[$i]['name'])."','".$partidos[$i]['acronym']."','".$partidos[$i]['logo']."','".$partidos[$i]['colour']."'";
    $sql .= ");";
}
if ($conn->multi_query($sql)=== TRUE){
    echo "<br>INSERTADO CON EXITO";
}else {
    echo "ERROR" . $conn->error;
}
*/
$sql="";
for ($i = 0; $i < count($distritos); $i++){
    $sql .= "INSERT INTO circunscripciones (id, nombre, delegados) VALUES (";
    $sql .= "".$distritos[$i]['id'].",'".$distritos[$i]['name']."',".$distritos[$i]['delegates'].");";
}
if ($conn->multi_query($sql)=== TRUE){
    echo "<br>INSERTADO CON EXITO";
}else {
    echo "ERROR" . $conn->error;
}

//YA TENEMOS TO DO ASI QUE AHORA TOCA IRNOS AL MAIN A PASAR LA BASE DE DATOS A OBJETOS
//Cerramos conexion
$conn->close();
?>