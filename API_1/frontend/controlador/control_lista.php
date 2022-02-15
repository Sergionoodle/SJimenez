<?php

//Creamos una variable que descodifique y pille sus files de la api
$hoteles_api = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_lista.php"));

session_start();

//Hacemos que la ordene, asi que si pilla el select
if(isset($_GET['ordenar'])){

    //Segun lo que sea pasa a poner la variable con una o otra api
    if($_GET['ordenar'] == "unsorted"){
        $hoteles_api = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_lista.php"));
    }else if($_GET['ordenar'] == "nombre"){
        $hoteles_api = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_lista_nom.php"));
    }else if($_GET['ordenar'] == "precio"){
        $hoteles_api = json_decode(file_get_contents("http://localhost/cursoPhp/API_1/backend/control_api/llamada_lista_precio.php"));

    }
}
require_once "../vista/lista.php";