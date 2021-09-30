<!DOCTYPE html>
<html lang="es">
<head>
    <title>Piramide</title>

</head>

<body>
<center>
    <?php
    $num = $_POST["num"];//con el post lo que hacemos es darle el valor
    //de donde esta nuestro elemento llamado numero

    //en el for mientras la i sea menor o igual a num se ira incrementando
    for ($i = 1; $i <=  $num; $i++){

        //y con esta iriamos hacia el otro lado
        for ($x = 1; $x <= $i; $x++){

            //esta variable usa una funcion que pasa de numero a letra
            $psigno = strval($i);

            //aqui asignamos la letra que en este caso es *
            echo $psigno= "*";
        }
        echo "<br>";
    }

    ?>
</center>
</body>
</html>