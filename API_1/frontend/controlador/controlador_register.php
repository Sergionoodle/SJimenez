<?php

if(isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['user'])){
    header("Location: http://localhost/cursoPhp/API_1/backend/control_api/llamada_register.php?email=".$_POST['email']."&passwd=".$_POST['passwd']."&user=".$_POST['user']);
}
require_once "../vista/register.php";