<?php

//Incluimos el modelo necesario para empezar a trabajar
include_once "../modelo/datos_hoteles_modelo.php";

//Creamos una variable con su ob
$modelo = new datos_hoteles_modelo();

//Ahora hacemos el isset para pasar el id de la pagina
if(isset($_GET['id'])) {
    $hotel = $modelo->pagina_principal_hoteles($_GET['id']);
}else{
    echo "ID NO SELECCIONADO";
}
    require_once "../vista/pagina_extendida.php";
?>
