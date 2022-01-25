<?php
session_start();

$_SESSION['log'] = false;

session_destroy();

header("Location: ../controlador/controlador_lista.php");
