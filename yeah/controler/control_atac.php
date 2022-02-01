<?php

include_once "../model/juego.php";

session_start();

$juego = new juego();

if($_GET['fu']>$_GET['fc']){
    $juego->ataca($_GET['id'],$_SESSION['u_id']);
    header("Location: ../controler/lista.php");
}else{
    echo "<script>alert('No puedes ganar')</script>";
    echo "<a href='../controler/lista.php'>Vuelve</a>";
}