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
echo "<br>";

echo "numeros primos <br>";

$minimo = 1;
$maximo = 14;
for ($i = $minimo; $i <= $maximo; $i++){
   if( getPrimo($i)){

   }else{
       echo "- ". $i."<br>";
   }
}

function getPrimo($numerito){

    $contador = 0;

    for($i = 1; $i < $numerito; $i++) {
        if ($numerito % $i == 0) {
            $contador = $contador +1;
        }
    }
    if($contador == 2){
        return true;// si es primo
    }else{
        return false; //no es primo
    }
}

?>