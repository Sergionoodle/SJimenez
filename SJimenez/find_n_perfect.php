<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfect.php">
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
        $division = Array();
        for($i = 1;$i < $num; $i++){

         if($num % $i == 0){

             $division[] = $i;
         }
     }
     return $division;
    }

    function isPerfectNum($num){
        //TODO: YOUR CODE HERE

        if(array_sum(getDivisors($num)) == $num) {
            return true;
        }else{
            return false;
        }


    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE
        $i=0;
        $perfects = Array();
        while(count($perfects)<$num){ //mientras que los que hay en la array sea menor que lo que introduce
            $i++;
            if(isPerfectNum($i)){
            $perfects[]=$i;

            }
        }

        echo "First ".$num." perfect numbers are: <br>";
    foreach($perfects as $perfect){
        echo "-".$perfect."<br>";
    }
}

    ?>
</div>
</body>
</html>
