<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){


    //TODO: Return an array of elephants sorted by it's number (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    for($fila = 0; $fila < count($elephants); $fila++){
//recorremos las filas de la array
        for($columna = 0; $columna < count($elephants); $columna++){
//recorremos las columnas de la array
            if($elephants[$columna]['number']> $elephants[$columna+1]['number']&&$elephants[$columna+1]['number'] != null){
                //Comparamos que la columna del numero el resultado sea mayor al resultado mas uno y que sea diferente de null

                $n1 = $elephants[$columna];
                $n2 = $elephants[$columna+1];
                $elephants[$columna]=$n2;
                $elephants[$columna+1]=$n2;

                var_dump($elephants);


            }
        }
    }
    return $elephants;

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
        <th colspan="6">Elephants (<?php ////TODO: Logic to print the number of elephants.
            echo count($elephants);?>)</th>
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

    $orden = getSortedElephantsByNumber($elephants);

    for ($i = 0; $i < count($elephants); $i++) {
        echo "<tr>";
        echo "<td>".$elephants[$i]['number']."</td>";
        echo "<td>".$elephants[$i]['name']."</td>";
        echo "<td>".$elephants[$i]['species']."</td>";
        echo "<td>".orden[$i]['number']."</td>";
        echo "<td>".$orden[$i]['number']."</td>";
        echo "<td>".$orden[$i]['number']."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>