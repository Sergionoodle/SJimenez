<html lang="es">
<head>
    <title>Arbol de Navidad</title>
</head>
<body>
<form method="post" action="chrismas_tree.php">
    <label>
        Number:
        <input type="text" name="num">
    </label>
    <input type="submit">
</form>

<div style="background-color: skyblue; display: inline-block;">
    <?php
    $num = $_POST["num"];

    for ($i = 0; $i <= $num; $i++){

        for($y = 0; $y < $num - $i; $y++){
            echo "<span style='color: skyblue'>*</span>";
        }

        for ($x = 0; $x < $i *2-1; $x++){
            echo "<span style='color: darkolivegreen'>*</span>";//este es el bucle que usamos para ir añadiendo *, donde la i la multiplicamos por dos y le quitamos uno para que de la punta y vaya equitativamente

        }
        for($z = 0; $z < $num - $i;$z++){
            echo "<span style='color: skyblue'>*</span>";
        }//este es para dar espacios por la derecha, realmente no es necesario
        echo "<br>";
    }//con el primer bucle lo que hacemos es ir dandole a cada * un salto de linea

    ?>
</div>

</body>
</html>
