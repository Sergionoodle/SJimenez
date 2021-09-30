<?php
echo "Gracias Dani :)";

$nombre = "Sergio";

echo "<br>Mi nombre es $nombre";

echo "<br>";

$numeroUno = 5;
$numeroDos = 6;

if ($numeroUno < $numeroDos) {
    echo "<br> El numero mayor es el numero $numeroDos";
}

echo "<br>";
echo "<br>";

$divisor = 10;

for ($i = 1; $i < $divisor; $i++) {
    if ($divisor % $i == 0) {
        echo "<br>" . $i;
    }
}
?>