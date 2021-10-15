<?php
if (isset($_POST["pass"])) {
    $psw = $_POST["pass"];
    $color = color($psw);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Como de segura es mi contraseña?</title>
    <style>
        p{
            color: <?php
             if($fuerte = isFuerte($psw) == 4){
                 echo "white;";
             }
             ?>;
        }
    </style>
</head>
<body style="background-color: <?php echo $color?>";>
<center>
<form action="constrasenaSegura.php" method="post">
    <p>Introduce tu contraseña: <br><input type="password" name="pass"></p>
    <p>
        <input type="submit" value="Enviardatos">
    </p>

    <?php
    if ( strval($psw) == "12345678" || strval($psw) == "1234" || strval($psw) == "password" || strval($psw) == "123456"){
        echo "<p>Esta entre las 5 primeras contrasñas mas usadas</p>";
    }
    ?>
</form>
</center>
</body>
</html>



<?php
function isFuerte($psw)
{

//Si la contraseña es de x strlen-->te dice la cantidad de caracteres
    if (strlen($psw) <= 4 || strval($psw) == "12345678" || strval($psw) == "1234" || strval($psw) == "password" || strval($psw) == "123456"){
        return 1;
    }else if(strlen($psw)<=7 ){
        return 2;
    }else if(strlen($psw) <= 12){
        return 3;
    }else if(strlen($psw) <= 20 ){
        return 4;
    }
}

function color($psw)
{
    $num = isFuerte($psw);
    if ($num == 1) {
        $color = "red";

    } else if ($num == 2) {
        $color = "orange";
    } else if ($num == 3) {
        $color = "green";
    } else if ($num == 4) {
        $color = "blue";
    }
    return $color;
}

?>


