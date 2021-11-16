<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="myDB";

$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";;

$resultados = json_decode(file_get_contents($api_url . "results"), true);
$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$dis = json_decode(file_get_contents($api_url . "districts"), true);

$con = new mysqli($servername, $username, $password,$dbname);

if($con->connect_error){
    die("connection failed: ".$con->connect_error);
}


$sql ="";
/*
for ($i = 0; $i < count($partidos); $i++){
    $name[] = $partidos[$i]["name"];
    $name[$i]=$con->real_escape_string($name[$i]);
    $sql .= "INSERT INTO tablapartid ( idPartidos,nombrePartidos, acronimoPartidos,logo,colour)VALUES (";
    $sql .= "'"  .$partidos[$i]['id']. "','" . $name[$i] . "','" . $partidos[$i]['acronym']. "','" . $partidos[$i]['logo']. "','" . $partidos[$i]['colour']. "'";
    $sql .= ");";
}

if ($con->multi_query($sql) === TRUE){
    echo "SI";
}else{
    echo "ERROR";
}*/
/*
for ($i=0;$i<count($resultados);$i++){
    $party[]=$resultados[$i]["party"];
    $party[$i]=$con->real_escape_string($party[$i]);
    $sql .= "INSERT INTO  resultados (distrito,partido,votos)VALUES (";
    $sql .= "'".$resultados[$i]["district"]."'".","."'".$party[$i]."'" .",".$resultados[$i]["votes"];
    //Coger los valores del array e ir introduciendolos en la tabla
    $sql.=");";
}

if ($con->multi_query($sql)=== TRUE){
    echo "BIEN";
}else{
    echo "BASURA";
}
*/
/*
for ($i = 0; $i < count($resultados); $i++){
    $sql .= "INSERT INTO tabladistritos (idResultados, nombreDistrito, delegados) VALUES (";
    $sql .= "'".$resultados[$i]['id']."','".$resultados[$i]['name']."','".$resultados[$i]['delegates']."'";
    $sql .= ");";
}
if ($con->multi_query($sql)=== TRUE){
    echo "BIEN";
}else{
    echo "BASURA";

$sql .= "DROP TABLE tablaprovincias;";

$con->query($sql);*/

$query = "SELECT * FROM partidos";

$result = $con->query($query);

$partidos = $result->fetch_all(MYSQLI_ASSOC);


/*
$query2 = "SELECT * FROM tabladistritos";
$result2 = $this->con->query($query2);
$datosProvincias = $result2->fetch_all(MYSQLI_ASSOC);


$query3 = "SELECT * FROM tablapartid";
$result3 = $this->con->query($query3);
$datosPartidos = $result3->fetch_all(MYSQLI_ASSOC);
*/

function selectResultados(){
    $array = [];
    $contador = 0;

    $query = "SELECT * FROM resultados";
    $resultado = $this->con->query($query);

    while($row = $resultado->fetch_assoc()){
        $array[$contador]=$row;
        $contador++;
    }
    return $array;
}

$con->close();



?>