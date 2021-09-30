<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="find_n_primes.php">
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


    }

    function isPrimeNum($num){
        //TODO: YOUR CODE HERE
        $contador = 0 ;
        for($i = 1; $i < $num; $i++){
            if($num % $i == 0){
                $contador = $contador +1;
            }
        }
        if($contador == 2){
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