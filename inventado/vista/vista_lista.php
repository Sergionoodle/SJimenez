<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>Objetos Tienda Raton Ratoncin</h1>
<p>Hola <?php
    if ($_SESSION['log']){
        echo $_SESSION['nom'];
    }
    ?></p>
<table>
    <tr>
        <th>id</th>
        <th>Nombre Objeto</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Puntuacion</th>
    </tr>
    <?php foreach ($objetos as $objeto){ ?>
    <tr>
        <td><?php echo $objeto->getId(); ?></td>
        <td><a href="../controlador/extendido.php?id=<?php echo $objeto->getId(); ?>"><?php echo $objeto->getNombre(); ?></a></td>
        <td><?php echo $objeto->getIdInformacion()->getDescripcion(); ?></td>
        <td><?php echo $objeto->getIdInformacion()->getPrecio(); ?></td>
        <td><?php echo $objeto->getIdInformacion()->getPuntuacion(); ?></td>
    </tr>
    <?php } ?>
</table>
<a href="../controlador/close.php">Cerrar</a>

</body>
</html>