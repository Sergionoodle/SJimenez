<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<?php
include ("resol.php");

$resultado = obDetalle();

$tu = $_GET['id'];

for ($i = 0; $i < count($resultado); $i++){
    if ($resultado[$i]->getCodigoProducto() == $tu){
        echo "<h1>".$resultado[$i]->getNombre()."</h1>";
    }
}

?>
</body>
</html>
