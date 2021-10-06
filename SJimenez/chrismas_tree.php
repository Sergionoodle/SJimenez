<html xml:lang="es">
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

<div>
    <?php
    $num = $_POST["num"]; //Con esto hacemos que le de el valor de num

    for($i = 0; $i <= $num; $i++){
        //Con este vamos a hacerlo de izquierda a derecha y cuando acabe

        for($x = 1; $x <= $i; $x++){

            echo "*";
        }
        echo "<br>";

    }

    ?>
</div>

</body>
</html>
