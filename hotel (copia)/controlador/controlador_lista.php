<?php

//Incluimos lo necesario para empezar a trabajar
include_once "../modelo/lista_hoteles_modelo.php";

//Creamos una variable con el ob de la lista de hoteles
$modelo = new lista_hoteles_modelo();

//Llamamos a la funcion
$hoteles = $modelo->listado_hoteles();


//Hacemos el require de la vista, ahora de esto para abajo será
//como si empezaras en la misma pagina
require_once "../vista/lista_hoteles.php";

?>