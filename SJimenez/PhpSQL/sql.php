<?php
$servername = "localhost";
$username = "root";
$password = "";

$con = new mysqli($servername, $username, $password);

if($con->connect_error){
    die("connection failed: ".$con->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE myDB";
if ($con->query($sql)=== TRUE){
    echo "Base de datos creada";
}else{
    echo  "Error".$con->error;
}

$con->close();
/*
function BInsert($from) {
    $query = "insert 50000 votos from ".$from;

    global $sql;
    $result = $sql.mssql_select_db($query);

    return $result;
}*/
?>