<?php
//incluimos todas las clases
include_once "principal.php";
include_once "staff.php";
include_once "sql.php";
include_once "multimedia.php";

//creamos la conexion de la base de datos
$dbo = new sql();
$principal = $dbo->getprincipal(4);

echo $principal->getTitulo();

?>