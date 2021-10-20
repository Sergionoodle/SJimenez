<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){
    //TODO: Return an array of elephants sorted by it's number (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    //Hacemos el primer bucle que recorra la fila de la array
    for ($i = 0; $i < count($elephants); $i++){

        //el segundo bucle que recorra la array
        for ($j = 0; $j < count($elephants); $j++){

            if($elephants[$i]['number'] < $elephants[$j]['number']){

                $aux = $elephants[$i];
                $elephants[$i] = $elephants[$j];
                $elephants[$j] = $aux;


            }
            /*  //Metemos la condicion para poder ordenar la array
              if($elephants[$j]['number'] > $elephants[$j+1]['number'] && $elephants[$j + 1]['number'] != null){
                  //como es una super array que usa el json para referirnos a un valor
                  //que comparar (tambien para sacar) hacemos referencia a lo que pone en la
                 //array, en este caso es number --> 1 ...

                  //ahora sustituimos
                  $numeroUno = $elephants[$j];
                  $numeroDos = $elephants[$j+1];
                  $elephants[$j]=$numeroDos;
                  $elephants[$j+1]= $numeroUno;

              }*/
        }
    }
    return $elephants; //Devolvemos elefantes, ahora es hora de representar
}
?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <!--Recuerda que hay que sacarlo con un echo-->
        <th colspan="6">Elephants (<?php echo count($elephants) ?>)</th>
        <!--Lo primero que vamos a hacer es contar el total de arrays que hay-->

    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //TODO: Logic to print the table body.
    //para enseñar hacemos lo siguiente

    //creamos una variable de array para meter la ordenada
    $ordenada = getSortedElephantsByNumber($elephants);

    for ($i = 0; $i < count($elephants); $i++){// creamos un contador para ir rellenando
        //la tabla poco a poco
        echo "<tr>";
        echo "<td>". $elephants[$i]['number']."</td>";
        echo "<td>". $elephants[$i]['name']."</td>";
        echo "<td>". $elephants[$i]['species']."</td>";//recuerda que
        //hay que hacer referencia con esto de species y eso que la hace con la array

        //Ahora la ordenada
        echo "<td>". $ordenada[$i]['number']."</td>";
        echo "<td>". $ordenada[$i]['name']."</td>";
        echo "<td>". $ordenada[$i]['species']."</td>";
        echo "</tr>";


    }
    ?>
    </tbody>
</table>
</body>
</html>