<?php
include_once "../modelo/modelo_lista.php";

$modelo = new modelo_lista();

$objetos = $modelo->objeto_list();

session_start();

require_once "../vista/vista_lista.php";