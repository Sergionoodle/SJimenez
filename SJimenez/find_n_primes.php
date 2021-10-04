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
        for($i = 1;$i <= $num; $i++){ //  con este bucle lo que hacemos es ir incrementando la i con el numero que colocamos

// de uno hasta el numero hace lo mismo

            if($num % $i == 0){// en esta ponemos una condicion donde si num se divide por i tiene  que dar 0

//luego la misma condicion que si el numero es dividido entre $i y da 0 lo metemos en una array

                $division[] = $i;//aqui metemos todos esos numeros en una array donde le damos el nombre de $division

//asi se incluye en la ultima posicion que tenia un valor, basicamente metemos los resultados de antes aqui

            }
        }
        return $division;//devolvemos dicha variable array con un return
//lo devolvemos

    }

    function isPrimeNum($num){
        //return count(getDivisors($num)) == 2; --> con esto devolveriamos un true o un false de si contar
        // los divisores que da getDivisors es igual a 2, si fuese asi daria true.

        //TODO: YOUR CODE HERE


        $tope = 1; // abrimos una variable para que sea el tope de lo que buscamos

        for($i=1; $tope <= $num; $i++){// aqui metemos una condicion donde si pongo x salga x

            $div = getDivisors($i); //invocamos getdivisors y lo metemos en una variable

            $cuentaDiv = count($div);// la variable de div la metemos con count() para que conte los divisores

            if($cuentaDiv == 2){//la ultima condicion que seria que si los divisores contados dan x son primos

                echo "<br>-- $div[1]"; // devolvemos la posicion con la que seria el numero dos de la array div

                $tope++;// hacemos que se incremente mediante la ultima condicion si se cumple
            }
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //$i = 0;
        //$primes = Array()
        //mientras el numero de primeros sea menor que el numero que he introducido haz eesto
        //while(count($primes)<$num){
           //$i++;
            //if(isPrimeNum($i)){
              //  $primes[] = $I;
            //}
        //}
        //echo $num -->    que las tenemos todos en la array
        //foreach($primes as $prime){ --> asi recorremos la array, la array es primes y los valores de dentro se llaman
        //prime, asi se usa el foreach en php

        //echo $prime
        //}
        //TODO: YOUR CODE HERE
        isPrimeNum($num);// llamamos a la funcion isPrimeNum y como en el if devolvemos un print se imprimira solo


    }
    ?>
</div>
</body>
</html>