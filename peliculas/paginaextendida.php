<?php
include_once "multimedia.php";
include_once "sql.php";
include_once "staff.php";
include_once "principal.php";


$sql = new sql();
$resultadoPrincipal = $sql->getprincipal();

if(isset($_GET['id'])){
    $resultado = $sql->getMultimedia($_GET['id']);
    $resultadoStaff = $sql->getStaff($_GET['id']);
}

echo $resultado->getYt();



?>
