<?php

include ("detalles.php");

$localhost = "localhost";
$nombreuser = "root";
$password = "";
$basededatos ="jardineria";
$conn = new mysqli($localhost, $nombreuser, $password, $basededatos);

    function sqlinnerjoin(){
        global $conn;
        $contador = 0;
        $array[] = "";
        $sql = "SELECT  p.CodigoProducto,p.Nombre,d.Cantidad FROM DetallePedidos as d \n"

            . "INNER JOIN Productos as P on p.CodigoProducto = d.CodigoProducto;";
        $resultado = $conn->query($sql);
        while ($r = $resultado->fetch_assoc()){
            $array[$contador] = $r;
            $contador++;
        }
        return $array;
    }

//Ahora pasamos a una variable el resultado de la funcion
$detallesproducto = sqlinnerjoin();

    function obDetalle(){
        global $detallesproducto;
        $contador = 0;
        $detalles[] = "";

        foreach ($detallesproducto as $detail){
            $detalles[$contador] = new detalles($detail['CodigoProducto'], $detail['Nombre'], $detail['Cantidad']);
            $contador++;
        }
        return $detalles;
    }
$conn->close();

//$obDetalles = obDetalle();

?>