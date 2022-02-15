<?php

session_start();
//Si pilla el id por get, y como tenemos al final el ?id= get[id] nos redirige bien la api
if(isset($_GET['id'])) {
    $hotel = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_datos_hoteles.php?id=" . $_GET['id']));
}

if(isset($_GET['id']) && isset($_POST['precio'])) {
    json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_mod_precio.php?id=".$_GET['id']."&precio=".$_POST['precio']));
}
require_once "../vista/hotel.php";