<html lang="es">
<head>
    <title>Get divisors</title>
</head>
<body>
<form method="post" action="ejercicio1.php">
    <label>
        Number:
        <input type="text" name="num"/><!--Aqui-->
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        //isset evalua si una variable esta definida o no.
        //Como funciona? esta variable de dentro POST busca la parte del formulario de num y cuando tu le metes el numero
        //lo que hace es ver que se ejecuta al enviar el formulario
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE

        for ($i = 1; $i < $num; $i++){ // si $i es menor que el numero se ejecuta y asi se suma y 1+1...
            //si num entre i el resto es 0 lo imprimimos
            if($num % $i == 0){
                echo "<br>Divisor: ".$i;// asi imprimimos los divisores
            }
        }

    }
    ?>
</div>
</body>
</html>