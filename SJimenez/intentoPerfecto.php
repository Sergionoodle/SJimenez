<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="intentoPerfecto.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function getDivisors($num){
        //TODO: YOUR CODE HERE
        $contador = 0;
        for($i = 1; $i < $num; $i++ ){
            if($num % $i == 0) {

                $contador = $contador + $i;
            }
        }
        return $contador;
    }

    function isPerfectNum($num){
        //TODO: YOUR CODE HERE
        $cont = getDivisors($num);


        if($cont == $num){
            return true;
        }else{
            return false;
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE


    }
    ?>
</div>
</body>
</html>