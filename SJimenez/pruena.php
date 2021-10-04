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

echo "<br>";

echo "numeros primos <br>";
$n1 = 1; // Dese
$n2 = 14;// Hasta
print 'Números primos del ';print $n1; print ' al '; print $n2;
for ($i = $n1; $i <= $n2; $i++)// hata aqui todo bien
{
    $nDiv = 0; // Número de divisores
    for ($n = 1; $n <= $i; $n++) // Desde 1 hasta el valor que tenga $i
    {
        if($i%$n == 0) // $n es un divisor de $i
        {
            $nDiv = $nDiv + 1; // Agregamos un divisor mas.
        }
    }
    if($nDiv == 2 or $i == 1)// Si tiene 2 divisores ó es 1 --> Es primo
    {
        print '<br>';
        print $i;
    }
}

echo "<br> esto es dificil";

$hola = array('viva','php');

var_dump($hola[0]);

?>