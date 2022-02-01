<?php
include_once "../model/mod_lista.php";
include_once "../model/juego.php";

session_start();

$juego = new juego();

$modelo = new mod_lista();

$datos = $modelo->listado();

$juego = $juego->tieneCiudad($_SESSION['u_id']);

$usuarios = $modelo->listado_usuarios($_SESSION['u_id']);

$fuerzaUser = 0;
require_once "../vista/lista.php";
